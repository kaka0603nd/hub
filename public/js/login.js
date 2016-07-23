$(document).ready(function(e){
        $('.name').keyup(test_name2);
        $('.email').keyup(test_email);
        $('.password').keyup(test_passwd);
        $('.password_again').keyup(test_passwdagain);
        $('.fullname').keyup(test_fullname);
        $('.fullho').keyup(test_fullho);
        $('.gioitinh').change(test_gioitinh);
        $('.date').keyup(test_date);
        
        
    var email = false;
    var name = false;
    var passwd = false;
    var passwdagain = false;
    var fullname= false;
    var fullho = false;
    var date = false;
    
		function test_name1(){
            var kiemtra = "[]$@#%^&()+_{}-`'~=|!*";
			var nhapvao = $(this).val();
			var arr_nhapvao = nhapvao.split("");
			var arr_kiemtra = kiemtra.split("");
			//alert(arr_nhapvao[0]+" "+arr_kiemtra[4]);
			//var i,j;
			for(i=0;i<= arr_nhapvao.length-1 ;i++){
				for(j=0;j<= arr_kiemtra.length-1 ;j++){
					if(arr_nhapvao[i] == arr_kiemtra[j]){
						//alert("nhap ki tu dac biet trong form");
						var newstr = nhapvao.replace(arr_nhapvao[i],"");
						$(this).val(newstr);
                        $('.err_name').html('Có lỗi trong quá trình nhập...');
                        $('.err_name').show("slow");
                        name = false;
					}
                    else{
                        $('.err_name').hide("slow");
                        name = true;
                    }
				}
			}
		}
        
    	function test_name2(){
    	    var mikExp = /[$\\@\\\#%\^\&\*\(\)\-\!\[\]\+\{\}\`\~\=\|]/;
        	var strPass = $(this).val();
        	var strLength = strPass.length;
        	var lchar = strPass.charAt((strLength) - 1);
        	if(lchar.search(mikExp) != -1) {
                //alert('nhap ki tu dac biet trong form');
                var newstr = strPass.substr(0,strLength-1);
                $(this).val(newstr);
                $('.err_name').html('chỉ được nhập số và chữ cái hoặc dấu _ ...');
                $('.err_name').show("slow");
                name = false;
            }
            else{
                $('.err_name').hide("slow");
                //btnsub_enable = true;
                name = true;
            }
    	}
        function test_email(){
             var reg_mail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
             var nhapvao = $(this).val();
             if(!reg_mail.test(nhapvao)){
                $('.err_email').html('Vui lòng nhập chính xác email(ví dụ: abc@gmail.com)...');
                $('.err_email').show("slow");
                //span.innerHTML ='Email không hợp lệ (ví dụ: abc@gmail.com)';
                email = false;
             }
             else{
                $('.err_email').hide("slow");
                email = true;
             }
        }
        function test_passwd(){
            var nhapvao = $(this).val();
            //alert(nhapvao.length);
            if(nhapvao.length <6){
                $('.err_password').html('Password nhiều hơn 6 kí tự');
                $('.err_password').show("slow");
                passwd = false;
            }
            else{
                $('.err_password').hide("slow");
                passwd = true;
            }
        }
        function test_passwdagain(){
            var nhapvao = $(this).val();
            if(nhapvao != $('.passwd').val()){
                $('.err_passwdagain').html('Password nhập không trùng khớp');
                $('.err_passwdagain').show("slow");
                passwdagain = false;
            }
            else{
                $('.err_passwdagain').hide("slow");
                passwdagain = true;
            }
        }
        function test_fullname(){
            var mikExp = /[$\\@\\\#%\^\&\*\(\)\-\[\]\+\_\!\{\}\`\~\=\|]/;
        	var strPass = $(this).val();
        	var strLength = strPass.length;
        	var lchar = strPass.charAt((strLength) - 1);
        	if(lchar.search(mikExp) != -1) {
                //alert('nhap ki tu dac biet trong form');
                var newstr = strPass.substr(0,strLength-1);
                $(this).val(newstr);
                $('.err_fullname').html('chỉ được nhập số và chữ cái hoặc dấu...');
                $('.err_fullname').show("slow");
                fullname = false;
            }
            else{
                $('.err_fullname').hide("slow");
                fullname = true;
            }
        }
        function test_fullho(){
            var mikExp = /[$\\@\\\#%\^\&\*\(\)\-\[\]\+\_\!\{\}\`\~\=\|]/;
        	var strPass = $(this).val();
        	var strLength = strPass.length;
        	var lchar = strPass.charAt((strLength) - 1);
        	if(lchar.search(mikExp) != -1) {
                //alert('nhap ki tu dac biet trong form');
                var newstr = strPass.substr(0,strLength-1);
                $(this).val(newstr);
                $('.err_fullho').html('chỉ được nhập số và chữ cái hoặc dấu...');
                $('.err_fullho').show("slow");
                fullho = false;
            }
            else{
                $('.err_fullho').hide("slow");
                fullho = true;
            }
        }
        function test_gioitinh(){
            
        }
        
        function test_date(){
            var nhapvao = $(this).val();
            //alert('hello');
            if(isNaN(nhapvao)== true || nhapvao>31 || nhapvao<0){
                //alert('hello');
                $('.err_date').html('chỉ được nhập số < 31 hoặc > 0...');
                $('.err_date').show("slow");
                date = false;
            }
            else{
                $('.err_date').hide("slow");
                date = true;
                if(name == true  && email == true && fullname == true && fullho == true && passwd == true && passwdagain == true && date == true){
                    $('.btnsub').removeClass('disabled');
                }
            }
        }
        
        /*if(!btnsub_enable){
            //alert('hello');
            $('.btnsub').addClass('disabled');
        }
        else{
            $('.btnsub').removeClass('disabled');
        }
        */
    });