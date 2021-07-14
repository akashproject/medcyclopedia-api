Medcyclopedia Api List
    #User Login
        url : http://127.0.0.1:8000/login
        method : POST
        params {mobile:9836555023,password:123456}

    #User Register
        url : http://127.0.0.1:8000/register
        method : POST
        params {all}

    #User Updateprofile
        url : http://127.0.0.1:8000/updateprofile
        method : PUT
        params {all}

    #User LoginOtp
        url : http://127.0.0.1:8000/send-otp
        method : POST
        params {mobile:9836555023}


    # Institute List
        url : http://127.0.0.1:8000/institutes
        method : POST
        params {state_id:20,course_id:1}

    # View Institute
        url : http://127.0.0.1:8000/institutes/{id}
        method : GET
