//Блокировки кнопки если JS отключен
 document.getElementById('btn').disabled = false

	var sendMessage = document.getElementById('result');
	var form = document.getElementById('ajax-form');
	url = '/';

	form.onsubmit =function(e) {
	//	e.preventDefault();

		var data = {};
		for (let i = 0, len=form.length; i < len; i++) {
			var input = form[i];
			if(input.name){
				data[input.name] = input.value;
			}
		}
	//	console.log(data);

		var jsonStr = JSON.stringify(data);
		console.log(data,jsonStr);
		var xhr = new XMLHttpRequest();
		xhr.open('POST', url, true);
		xhr.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
		xhr.onreadystatechange = function () {
			if(xhr.readyState != 4) return;
			if(xhr.status != 200){
				sendMessage.innerHTML = xhr.statusText;
			} else {
				form.reset();
				location.href ='/cabinet';
			}
		}
		xhr.send(jsonStr);
	}