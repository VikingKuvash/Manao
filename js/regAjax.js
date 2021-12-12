//Блокировки кнопки если JS отключен
document.getElementById('btn').disabled = false

/*	$(function() {
		$('ajax_form').submit(function(e) {
		e.preventDefault(); 
		  var $form = $(this);
		  $.ajax({
			dataType: 'json',
			type: $form.attr('method'),
			url: '/reg',
			data: $form.serialize()
		  }).done(function() {
			console.log('success');
		  }).fail(function() {
			console.log('fail');
		  });
		  //отмена действия по умолчанию для кнопки submit
		//e.preventDefault(); 
		});
	  });*/
	  /*
	  $(function(){
		$('ajax_form').click(function(e){ 
			e.preventDefault(); 
			var $form =$(this);
		$.ajax({
			type: "POST",
			url: "/reg",
			data: $form.serialize(),
			dataType: 'json',
			success: function(res) {
			  console.log(res);
			},
			error: function(error) {
				console.log(error);
				return false;
			}
		  });
	

	  	});
	  });
	  */
	 /* НЕ ТРОГАЙ БЛЯТЬ ЭТО 
	  $( document ).ready(function() {
        $("#btn").click(
            function(){
                sendAjaxForm('result_form', 'ajax_form', '/reg');
                return false; 
            }
        );
    });
    function sendAjaxForm(result_form, ajax_form, url) {
        $.ajax({
            url:     url, 
            type:     "POST", 
            dataType: "json", 
            data: $("#"+ajax_form).serialize(),  
            success: function(response) {
                result = $.parseJSON(response);
                    console.log(response);
            },
             error: function(err) { // Данные не отправлены
             console.log(err);
             }
         });
    }
	*/
	
	var sendMessage = document.getElementById('result_form');
	var form = document.getElementById('ajax_form'),
	url = '/reg';
	form.onsubmit = function(e) {
		e.preventDefault();
	
		var data = {}; //переменная для сбора данных из формы
		for (var i = 0, len = form.length; i < len; i++) {
			var input = form[i];
			if (input.name) {
				data[input.name] = input.value;
			}
		}
	
		var jsonStr = JSON.stringify(data); //преобразуем данные из объекта data в json-строку
		console.log(data, jsonStr);
		var xhr = new XMLHttpRequest();
		xhr.open('POST', url, true);
		xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
		xhr.onreadystatechange = function() {
			if (xhr.readyState != 4) return;
			if (xhr.status != 200) {
				//alert(xhr.status + ': ' + xhr.statusText);
				sendMessage.innerHTML = xhr.statusText; //выводим сообщение об ошибке
			} else {
			//console.log(xhr.response);
			//alert(xhr.responseText);
				//sendMessage.innerHTML = xhr.responseText;
				form.reset();//очищаем форму
			}
		}
		xhr.send(jsonStr); //отсылаем строку в формате JSON
	}


	
/*
	document.addEventListener('DOMContentLoaded', () => {

		const ajaxSend = async (formData) => {
			const fetchResp = await fetch('/reg', {
				method: 'POST',
				body: formData
			});
			if (!fetchResp.ok) {
				throw new Error(`Ошибка по адресу ${url}, статус ошибки ${fetchResp.status}`);
			}
			return await fetchResp.text();
		};
	
		const forms = document.querySelectorAll('form');
		forms.forEach(form => {
			form.addEventListener('submit', function (e) {
				e.preventDefault();
				const formData = new FormData(this);
	
				ajaxSend(formData)
					.then((response) => {
						console.log(response);
						form.reset(); // очищаем поля формы 
					})
					.catch((err) => console.error(err))
			});
		});
	
	});
*/
