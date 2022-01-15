var apiObj = null;

function StartMeeting(roomName, user_type) {
    const domain = 'meet.jit.si';

    toolbar_buttons = [];
    if (user_type == 'model') {
        toolbar_buttons = ['microphone', 'camera', 'closedcaptions', 'fullscreen', 'chat', 'videoquality'];
    }
    else if (user_type == 'user') {
        toolbar_buttons = ['fullscreen', 'chat', 'videoquality'];
    }
    else {
        toolbar_buttons = ['fullscreen', 'videoquality'];
    }

    // // TOOLBAR_BUTTONS: [
    //     'microphone', 'camera', 'closedcaptions', 'desktop', 'embedmeeting', 'fullscreen',
    //     'fodeviceselection', 'hangup', 'profile', 'chat', 'recording',
    //     'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
    //     'videoquality', 'filmstrip', 'invite', 'feedback', 'stats', 'shortcuts',
    //     'tileview', 'select-background', 'download', 'help', 'mute-everyone', 'mute-video-everyone', 'security'
    // ],
    
    const options = {
        roomName: roomName,
        width: '100%',
        height: '100%',
        parentNode: document.querySelector('#jitsi-meet-conf-container'),
        DEFAULT_REMOTE_DISPLAY_NAME: 'New User',
        configOverwrite: {
            doNotStoreRoom: true,
            startVideoMuted: 0,
            startAudioMuted: 0,
            startWithVideoMuted: true,
            startWithAudioMuted: true,
            disableResponsiveTiles: true,
            disableTileView: true,
            requireDisplayName: false,
            enableWelcomePage: false,
            disableProfile: true,
            hideParticipantsStats: true,
            remoteVideoMenu: {
                disableKick: true
            },
        },
        interfaceConfigOverwrite: {
            SHOW_JITSI_WATERMARK: false,
            SHOW_BRAND_WATERMARK: false,
            SHOW_WATERMARK_FOR_GUESTS: false,
            CONNECTION_INDICATOR_DISABLED: false,
            TOOLBAR_BUTTONS: toolbar_buttons,
            VIDEO_LAYOUT_FIT: 'both',
        },
        onload: function () {
            $('#joinMsg').hide();
            $('#container').show();
            $('#toolbox').show();
        }
    };
    apiObj = new JitsiMeetExternalAPI(domain, options);
    apiObj.executeCommand('toggleFilmStrip', false);
    apiObj.executeCommand('subject', 'Model Live Video');
}
