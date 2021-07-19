Medcyclopedia Api List
    #User Login
        url : http://127.0.0.1:8000/login
        method : POST
        params {mobile:9836555023,password:123456}
	#{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvcmVnaXN0ZXIiLCJpYXQiOjE2MjY3MTc5NzUsImV4cCI6MTYyNjcyMTU3NSwibmJmIjoxNjI2NzE3OTc1LCJqdGkiOiJGYnQwTWhkMzN2QU44S1JQIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.L7Pt6R0N8rjaMLiAo7EOuqfo1vUc02Uk3cFov2607a4","token_type":"bearer","expires_in":3600}

    #User Register
        url : http://127.0.0.1:8000/register
        method : POST
        params {all}
		
	#{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvcmVnaXN0ZXIiLCJpYXQiOjE2MjY3MTc5NzUsImV4cCI6MTYyNjcyMTU3NSwibmJmIjoxNjI2NzE3OTc1LCJqdGkiOiJGYnQwTWhkMzN2QU44S1JQIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.L7Pt6R0N8rjaMLiAo7EOuqfo1vUc02Uk3cFov2607a4","token_type":"bearer","expires_in":3600}

    #User Updateprofile
        url : http://127.0.0.1:8000/updateprofile
        method : PUT
        params {all}

    #User LoginOtp
        url : http://127.0.0.1:8000/send-otp
        method : POST
        params {mobile:9836555023}
		
	url : http://127.0.0.1:8000/courses
		method : GET
	#[{"id":1,"course_name":"MBBS","created_at":"2021-07-19T23:11:08.000000Z","updated_at":"2021-07-19T23:11:08.000000Z"},{"id":2,"course_name":"BDS","created_at":"2021-07-19T23:11:08.000000Z","updated_at":"2021-07-19T23:11:08.000000Z"},{"id":3,"course_name":"MD\/MS\/DEPLOMA","created_at":"2021-07-19T23:11:08.000000Z","updated_at":"2021-07-19T23:11:08.000000Z"},{"id":4,"course_name":"BMS","created_at":"2021-07-19T23:11:08.000000Z","updated_at":"2021-07-19T23:11:08.000000Z"},{"id":5,"course_name":"BHMS","created_at":"2021-07-19T23:11:08.000000Z","updated_at":"2021-07-19T23:11:08.000000Z"},{"id":6,"course_name":"MD AYURVEDA","created_at":"2021-07-19T23:11:08.000000Z","updated_at":"2021-07-19T23:11:08.000000Z"},{"id":7,"course_name":"MD HOMIOPATHY","created_at":"2021-07-19T23:11:08.000000Z","updated_at":"2021-07-19T23:11:08.000000Z"},{"id":8,"course_name":"PHARMACY","created_at":"2021-07-19T23:11:08.000000Z","updated_at":"2021-07-19T23:11:08.000000Z"}]

    # Institute List
        url : http://127.0.0.1:8000/institutes
        method : POST
        params {state_id:20,course_id:1,ownership_type:'Private'}
		
	#[{"id":1,"title":"All India Institute of Medical Sciences","description":"All India Institute of Medical Sciences (AIIMS) Kalyani was officially approved, under the Pradhan Mantri Swasthya Suraksha Yojana (PMSSY), by Union Cabinet on October 07, 2015. The Institute was approved to be established over a span of 179.82-acre land on National Highway \u2013 34 around 50 km from Kolkata, in the village of Basantapur, near Kalyani, District Nadia, WestBengal.","shortname":"All India Institute of Medical Sciences","likecount":10,"contact_no":"","email":"tasdsa@sfds.oco","admin_email":"asdas@fsdf.com","year_of_inception":1990,"website":"sads.com","hospital":"Yes","placement":"Yes","food_availablity":"Yes","wifi":"Yes","library":"Yes","scholarships":"Yes","address":"123 st","how_to_reach":"123 st","ownership_type":"Private","state_id":12,"city":"Kolkata","album_id":1,"brouchure":1,"created_at":"2021-07-19 01:19:03","updated_at":"2021-07-19 01:19:03"},{"id":2,"title":"Calcutta National Medical College","description":"All India Institute of Medical Sciences (AIIMS) Kalyani was officially approved, under the Pradhan Mantri Swasthya Suraksha Yojana (PMSSY), by Union Cabinet on October 07, 2015. The Institute was approved to be established over a span of 179.82-acre land on National Highway \u2013 34 around 50 km from Kolkata, in the village of Basantapur, near Kalyani, District Nadia, WestBengal.","shortname":"Calcutta National Medical College","likecount":10,"contact_no":"","email":"tasdsa@sfds.oco","admin_email":"asdas@fsdf.com","year_of_inception":1990,"website":"sads.com","hospital":"Yes","placement":"Yes","food_availablity":"Yes","wifi":"Yes","library":"Yes","scholarships":"Yes","address":"123 st","how_to_reach":"123 st","ownership_type":"Private","state_id":12,"city":"Kolkata","album_id":1,"brouchure":1,"created_at":"2021-07-19 01:19:03","updated_at":"2021-07-19 01:19:03"}]

	

    # View Institute
        url : http://127.0.0.1:8000/institute/{id}
        method : GET
	# {"id":1,"title":"All India Institute of Medical Sciences","description":"Officially Jayaprakash Narayan All India Institute of Medical Sciences is a medical college and medical research public university based in Patna, Bihar, India, established in 2012. The Institute will operate autonomously under the Ministry of Health and Family Welfare (India)","shortname":"All India Institute of Medical Sciences","likecount":10,"contact_no":"9836555023,6290565997","email":"akasjh@gmail.com","admin_email":"akasjh@gmail.com","year_of_inception":1992,"website":"test.com","hospital":"Yes","placement":"Yes","food_availablity":"Yes","wifi":"Yes","library":"Yes","scholarships":"Yes","address":"123 St, Kolkata","how_to_reach":"Kolkata","ownership_type":"Private","state_id":1,"city":"Kolkata","album_id":1,"brouchure":1,"created_at":null,"updated_at":"2021-07-20T23:59:04.000000Z"}

	#Institute Course
	
	url : http://127.0.0.1:8000/institute-courses/{institute_id}
		method : GET
	
	#[{"id":1,"course_name":"MMBS","eligibility":"NEET UG","duration":"5.6 Yrs","seat":125,"last_enrolment_date":"Oct,31 2020","fee":"9000","course_id":1,"institute_id":1,"created_at":"2021-07-19T17:11:34.000000Z","updated_at":"2021-07-19T17:11:37.000000Z"},{"id":5,"course_name":"MBBS Full Time","eligibility":"NEET UG","duration":"3 Years","seat":100,"last_enrolment_date":"Oct,31 2020","fee":"100","course_id":1,"institute_id":1,"created_at":"2021-07-20T00:11:45.000000Z","updated_at":"2021-07-20T00:11:49.000000Z"}]
	
	url : http://127.0.0.1:8000/states
		method : GET
	
	#[{"id":2,"state_name":"Andaman and Nicobar Islands","created_at":null,"updated_at":null},{"id":3,"state_name":"andhra-pradesh","created_at":null,"updated_at":null},{"id":4,"state_name":"Arunachal-Pradesh","created_at":null,"updated_at":null},{"id":5,"state_name":"assam","created_at":null,"updated_at":null},{"id":6,"state_name":"bihar","created_at":null,"updated_at":null},{"id":7,"state_name":"Chandigarh","created_at":null,"updated_at":null},{"id":8,"state_name":"chhattisgarh","created_at":null,"updated_at":null},{"id":9,"state_name":"Silvassa-ut","created_at":null,"updated_at":null},{"id":10,"state_name":"Daman-and-Diu","created_at":null,"updated_at":null},{"id":11,"state_name":"delhi-cap","created_at":null,"updated_at":null},{"id":12,"state_name":"Goa","created_at":null,"updated_at":null},{"id":13,"state_name":"gujarat","created_at":null,"updated_at":null},{"id":14,"state_name":"haryana","created_at":null,"updated_at":null},{"id":15,"state_name":"Himachal Pradesh","created_at":null,"updated_at":null},{"id":16,"state_name":"kashmir","created_at":null,"updated_at":null},{"id":17,"state_name":"jharkhand","created_at":null,"updated_at":null},{"id":18,"state_name":"karnataka","created_at":null,"updated_at":null},{"id":19,"state_name":"kerala","created_at":null,"updated_at":null},{"id":20,"state_name":"Lakshadweep","created_at":null,"updated_at":null},{"id":21,"state_name":"madhya pradesh","created_at":null,"updated_at":null},{"id":22,"state_name":"maharashtra","created_at":null,"updated_at":null},{"id":23,"state_name":"Manipur","created_at":null,"updated_at":null},{"id":24,"state_name":"Meghalaya","created_at":null,"updated_at":null},{"id":25,"state_name":"Mizoram","created_at":null,"updated_at":null},{"id":26,"state_name":"Nagaland","created_at":null,"updated_at":null},{"id":27,"state_name":"Odisha","created_at":null,"updated_at":null},{"id":28,"state_name":"Puducherry","created_at":null,"updated_at":null},{"id":29,"state_name":"punjab","created_at":null,"updated_at":null},{"id":30,"state_name":"rajasthan","created_at":null,"updated_at":null},{"id":31,"state_name":"Sikkim","created_at":null,"updated_at":null},{"id":32,"state_name":"tamil-nadu","created_at":null,"updated_at":null},{"id":33,"state_name":"talangana","created_at":null,"updated_at":null},{"id":34,"state_name":"Tripura","created_at":null,"updated_at":null},{"id":35,"state_name":"uttar-pradesh","created_at":null,"updated_at":null},{"id":36,"state_name":"uttaranchal","created_at":null,"updated_at":null},{"id":37,"state_name":"west-bengal","created_at":null,"updated_at":null}]
	
	