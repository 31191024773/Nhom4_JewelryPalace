function SwitchSignUp(check){
    if(check == 1){
        tablinks = document.getElementById("sign_in");
        tablinks.className = tablinks.className.concat(" hide_form");
        tablinks = document.getElementById("sign_up");
        tablinks.className = tablinks.className.replace("hide_form", "");
    }
    if(check == 2){
        tablinks = document.getElementById("sign_up");
        tablinks.className = tablinks.className.concat(" hide_form");
        tablinks = document.getElementById("sign_in");
        tablinks.className = tablinks.className.replace(" hide_form", "");
    }

}

