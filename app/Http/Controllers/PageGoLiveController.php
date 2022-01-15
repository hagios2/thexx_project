<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BO\Abuses\Details\DateTime;
use App\Models\LstPricing;
use App\Models\LstPricingType;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\user_detail;
use App\Models\abuse;
use App\Models\incident_document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Validator;
use Session;
use File;
use Illuminate\Support\Facades\DB;

class PageGoLiveController extends Controller
{
    private function getAuthUser()
    {

        if (!isset(Auth::user()->id)) {
            $user_id = '';
        } else {
            $user_id = User::find(Auth::user()->id)->id;
        }
        return $user_id;

    }

    public function show()
    {

        if (!isset(Auth::user()->id)) {

            return view('includes.templates.error');
        }
        $camera_name = user_detail::select('camera_man_name')
            ->where('user_details.user_id', Auth::user()->id)
            ->get();
      $camera_name=$camera_name[0]->camera_man_name;
        //  dd(Auth::id());
        $chat_data = $this->conversation(Auth::id());
        $reports = abuse::select('incident_id', 'status', 'user_name')
            ->where('abuses.model_id', Auth::user()->id)
            ->join('user_details', 'user_details.user_id', 'abuses.user_id')
            ->orderBy('abuses.created_at', 'ASC')
            ->get();

        // Session::forget('docs');
        $this->cleanSessionAndDirectory();

        $lvAux_map_tokens_fn = function ($pTokens) {
            return [
                "description" => \Lang::get("strings.tokens_min", ["tokens" => $pTokens]),
                "tokens" => $pTokens
            ];
        };

        return view('includes/templates/pages/page-startshow-golive', [
            'reports' => $reports,
            'chat_data' => $chat_data,
            'camera_name'=>$camera_name,
            "private_pricing_DS" => collect([6, 12, 18, 30, 60, 90])->map($lvAux_map_tokens_fn)->toArray(),
            "cam2cam_pricing_DS" => collect([60, 90, 120, 180, 200])->map($lvAux_map_tokens_fn)->toArray(),
            "sex_toy_pricing_DS" => collect([12, 18, 30, 60, 90, 120])->map($lvAux_map_tokens_fn)->toArray(),
        ]);
    }

    public function saveDocument(Request $request)
    {
        if ($request->session()->get('docs') !== null) {
            if (count($request->session()->get('docs')) > 4) {
                return response()->json(['warning' => 'more than 5 not allowed']);
            }
        }
        $model_id = User::find(Auth::user()->id)->id;
        $token = substr(str_shuffle("0123456789"), 0, 8);
        $fileNameToStore = '';
        $validation = Validator::make($request->all(), [
            'proof_url' => 'required|mimes:mp4,jpeg,jpg,png'
        ]);
        if ($validation->validate()) {

            $path = public_path() . '/uploads/fake_docs';
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $extension = $request->file('proof_url')->getClientOriginalExtension();
            $filename = 'Model_' . $model_id . '_' . $token;
            $fileNameToStore = $filename . '.' . $extension;

            if (!Session::has('docs')) {
                // File::cleanDirectory(public_path('uploads/fake_docs'));
                $this->cleanSessionAndDirectory();
                $arr = [];
                $arr[0] = $fileNameToStore;
                $request->session()->put('docs', $arr);
            } else {
                $arr = $request->session()->get('docs');
                $cnt = count($arr);

                $arr[$cnt] = $fileNameToStore;
                $request->session()->put('docs', $arr);
            }
            $request->file('proof_url')->move(public_path('uploads/fake_docs'), $fileNameToStore);
            return response()->json(['doc_count_message' => "Docs uploaded successfully "]);
        }
    }

    public function saveReport(Request $request)
    {
        if ($request->session()->get('docs') == null) {
            return response()->json(['NoDoc' => 'No document selected.Please check']);
        }
        $get_user_id = user_detail::select('user_id')
            ->where('user_name', $request->user)
            ->get();
        if (!isset($get_user_id[0]->user_id)) {
            $this->cleanSessionAndDirectory();
            return response()->json(['failure' => 'No such username found.Please check']);
        }
        $model_id = User::find(Auth::user()->id)->id;

        $date = abuse::select('created_at')
            ->where('user_id', $get_user_id[0]->user_id)
            ->where('model_id', $model_id)
            ->get();

        if (isset($date[0])) {
            $index = count($date) - 1;
            $fdate = $date[$index]->created_at->format('m/d/Y');
            $tdate = date('Y-m-d');
            $datetime1 = strtotime($fdate); // convert to timestamps
            $datetime2 = strtotime($tdate); // convert to timestamps
            $days = (int)(($datetime2 - $datetime1) / 86400);

            if ($days < 3) {
                $this->cleanSessionAndDirectory();
                return response()->json(['warning' => 'You can only report after 3 days']);
            }
        }
        if (Session::has('docs')) {
            File::copyDirectory(public_path('uploads/fake_docs'), public_path('uploads/Model_Report'));
        }

        $token = substr(str_shuffle("0123456789"), 0, 8);
        $abuse = new abuse();
        $abuse->incident_id = $token;
        $abuse->model_id = $model_id;
        $abuse->user_id = $get_user_id[0]->user_id;
        $abuse->description = $request->description;
        $abuse->save();

        $fileNameToStore = $request->session()->get('docs');

        for ($i = 0; $i < count($request->session()->get('docs')); $i++) {

            $incident_document = new incident_document();
            $incident_document->abuse_id = $abuse->id;
            $incident_document->proof_url = config('env_variables.upload_path') . 'Model_Report/' . $fileNameToStore[$i];
            $index = explode(".", $fileNameToStore[$i]);
            $type = $index[1];
            $incident_document->proof_type = $type;

            $incident_document->save();
        }
        $this->cleanSessionAndDirectory();
        $reports_count = abuse::where('abuses.model_id', Auth::user()->id)
            ->count();

        return response()->json([
            'success' => 'yes',
            'sr_no' => $reports_count,
            'incident_id' => $token,
            'user_name' => $request->user,
            'status' => 'Under Analysis',

        ]);
    }

    public function cleanSessionAndDirectory()
    {
        File::cleanDirectory(public_path('uploads/fake_docs'));
        Session::forget('docs');
    }

    public function conversation($userId)
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $friendInfo = User::findOrFail($userId);
        $myInfo = User::find(Auth::id());
        // dd($this->getAuthUser());
        // $groups= MessageGroup::get();
        $auth_user = $this->getAuthUser();

        // $chats =DB::select("SELECT messages.message,user_messages.sender_id,user_messages.receiver_id
        // FROM (messages
        // INNER JOIN user_messages ON user_messages.message_id = messages.id)
        // WHERE (user_messages.receiver_id=$userId AND user_messages.sender_id = $auth_user) OR (user_messages.receiver_id=$auth_user AND
        // user_messages.sender_id =$userId)
        // ");

        $chats = DB::select("SELECT messages.message,user_messages.sender_id,
            user_messages.receiver_id,users.name
            FROM ((messages
            INNER JOIN user_messages ON user_messages.message_id = messages.id)
            INNER JOIN users ON users.id = messages.user_id)
            WHERE (user_messages.receiver_id=$userId)
            ");

        //dd($chats);
        // $this->data['groups'] = $groups;
        $this->data['users'] = $users;
        $this->data['friendInfo'] = $friendInfo;
        $this->data['myInfo'] = $myInfo;
        $this->data['users'] = $users;
        $this->data['chats'] = $chats;
        $this->data['auth_user'] = $auth_user;
        $this->data['auth_user_name'] = Auth::user()->name;
        // dd($this->data);
        return $this->data;
        // return view('message.conversation', $this->data);
    }

}