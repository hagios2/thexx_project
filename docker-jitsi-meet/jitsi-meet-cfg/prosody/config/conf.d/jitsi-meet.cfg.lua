admins = {
    "focus@auth.thexxx.club",
    "jvb@auth.thexxx.club"
}

unlimited_jids = {
    "focus@auth.thexxx.club",
    "jvb@auth.thexxx.club"
}

plugin_paths = { "/prosody-plugins/", "/prosody-plugins-custom" }
http_default_host = "thexxx.club"















consider_bosh_secure = true;

-- Deprecated in 0.12
-- https://github.com/bjc/prosody/commit/26542811eafd9c708a130272d7b7de77b92712de




  

cross_domain_websocket = { "https://thexxx.club","https://thexxx.club" }
cross_domain_bosh = { "https://thexxx.club","https://thexxx.club" }


VirtualHost "thexxx.club"

    -- https://github.com/jitsi/docker-jitsi-meet/pull/502#issuecomment-619146339
    
    authentication = "token"
    
    app_id = ""
    app_secret = ""
    allow_empty_token = true

    ssl = {
        key = "/config/certs/thexxx.club.key";
        certificate = "/config/certs/thexxx.club.crt";
    }
    modules_enabled = {
        "bosh";
        
        "websocket";
        "smacks"; -- XEP-0198: Stream Management
        
        "pubsub";
        "ping";
        "speakerstats";
        "conference_duration";
        
        
        
    }

    

    speakerstats_component = "speakerstats.thexxx.club"
    conference_duration_component = "conferenceduration.thexxx.club"

    c2s_require_encryption = false



VirtualHost "auth.thexxx.club"
    ssl = {
        key = "/config/certs/auth.thexxx.club.key";
        certificate = "/config/certs/auth.thexxx.club.crt";
    }
    modules_enabled = {
        "limits_exception";
    }
    authentication = "internal_hashed"


VirtualHost "recorder.meet.jitsi"
    modules_enabled = {
      "ping";
    }
    authentication = "internal_hashed"


Component "internal-muc.thexxx.club" "muc"
    storage = "memory"
    modules_enabled = {
        "ping";
        
    }
    restrict_room_creation = true
    muc_room_locking = false
    muc_room_default_public_jids = true

Component "muc.thexxx.club" "muc"
    storage = "memory"
    modules_enabled = {
        "muc_meeting_id";
        
        
    }
    muc_room_cache_size = 1000
    muc_room_locking = false
    muc_room_default_public_jids = true

Component "focus.thexxx.club" "client_proxy"
    target_address = "focus@auth.thexxx.club"

Component "speakerstats.thexxx.club" "speakerstats_component"
    muc_component = "muc.thexxx.club"

Component "conferenceduration.thexxx.club" "conference_duration_component"
    muc_component = "muc.thexxx.club"


