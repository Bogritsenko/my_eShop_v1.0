// переменная для хранения ссылки на объект XMLHttpRequest
var xmlHttp = createXmlHttpRequestObject();
// переменная для хранения адреса удаленного сервера
var serverAddress = "ajax.php";
// если установлено значение true, выводятся подробные сообщения об ошибках
var showErrors = true;
// инициализировать кэш запросов
var cache = new Array();


////////////////////общие функции/////////////////////////////////////


// создает экземпляр объекта XMLHttpRequest
function createXmlHttpRequestObject() 
{
    // переменная для хранения ссылки на объект XMLHttpRequest
    var xmlHttp;
    // эта часть кода должна работать во всех броузерах, за исключением 
    // IE6 и более старых его версий
    try
    {
        // попытаться создать объект XMLHttpRequest
        xmlHttp = new XMLHttpRequest();
    }
    catch(e)
    {
        // предполагается, что в качестве броузера используется
        // IE6 или более старая его версия
        var XmlHttpVersions = new Array("MSXML2.XMLHTTP.6.0",
                                        "MSXML2.XMLHTTP.5.0",
                                        "MSXML2.XMLHTTP.4.0",
                                        "MSXML2.XMLHTTP.3.0",
                                        "MSXML2.XMLHTTP",
                                        "Microsoft.XMLHTTP");
        // попробовать все возможные prog id, 
        // пока какая либо попытка не увенчается успехом
        for (var i=0; i<XmlHttpVersions.length && !xmlHttp; i++) 
        {
            try 
            { 
            // попытаться создать объект XMLHttpRequest 
            xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
            } 
            catch (e) {} //игнорировать возможные ошибки
        }
    }
    // вернуть созданный объект или вывести сообщение об ошибке
    if (!xmlHttp)
       displayError("Ошибка создания обьекта XMLHttpRequest.");
    else 
       return xmlHttp;
}

 // эта функция выводит сообщение об ошибке
function displayError($message)
{
    // игнорировать ошибку, если в showErrors находится значение false
    if (showErrors)
    {
        // отключить вывод сообщений об ошибках
        showErrors = false;
        // вывести сообщение об ошибке
 
        alert("Обнаружена ошибка: \n" + $message);
        // повторная проверка не ранее, чем через 10 секунд
        setTimeout("add();", 10000);
        setTimeout("update();", 10000);
        setTimeout("clearCart();", 10000);
    }
}



// эта функция отправляет даныые на сервер, добавляет в корзину выбор покупателя 
function add(id, price)
{
    // продолжать только если в xmlHttp не пустая ссылка 
    if (xmlHttp)
    {
        // если был принят не пустой аргумент, помещаем его в кэш в виде
        // строки запроса, который будет послан серверу для проверки
        if (id)
        {
        // преобразовать значения, в форму, которая безопасно 
        // может быть включена в строку запроса HTTP
        id = encodeURIComponent(id);
        // добавить значения в очередь
        cache.push("id=" + id);
        }
        // попытаться установить соединение с сервером
        try
        {
             // продолжать только если объект XMLHttpRequest не занят
             // и кэш не пуст
            if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0)&& cache.length > 0)
            {
                 // извлечь новый набор параметров из кэша
                var cacheEntry = cache.shift();
                // послать запрос серверу 
                xmlHttp.open("POST", serverAddress, true);
                xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlHttp.onreadystatechange = handleRequestStateChange;
                xmlHttp.send(cacheEntry);
            }
        }
        catch (e)
        {
            // вывести сообщение об ошибке при неудачной попытке установить соединение с сервером
            displayError(e.toString());
        }
    }
}

// эта функция обслуживает ответы для функции add()
function handleRequestStateChange() 
{
    // когда readyState = 4, мы можем прочитать ответ сервера
    if (xmlHttp.readyState == 4) 
    {
        // продолжать, только если статус HTTP равен «OK»
        if (xmlHttp.status == 200) 
        {
            try
            {
                // прочитать ответ, полученный от сервера
                readResponse();
            }
            catch(e)
            {
                 // вывести сообщение об ошибке
                 displayError(e.toString());
            }
        }
        else
        {
            // вывести сообщение об ошибке
            displayError(xmlHttp.statusText);
        }
    }
}

// читает ответ сервера для функции add()
function readResponse()
{
    // получить ответ сервера
    var response = xmlHttp.responseText;
    // ошибка сервера?
    if (response.indexOf("ERRNO") >= 0 
        || response.indexOf("error:") >= 0
        || response.length == 0)
    throw(response.length == 0 ? "Server error." : response);
    responseXml = xmlHttp.responseXML;
    xmlDoc = responseXml.documentElement;
    status = xmlDoc.getElementsByTagName("status")[0].firstChild.data;
    if (status == "1") 
   {
        total = Number(document.getElementById("total").innerHTML);
        price = Number(price);
        total = total + price;
        total = document.getElementById("total").innerHTML = total;
   }
    setTimeout("add();", 500);
}


// эта функция отправляет даныые на сервер, добавляет в корзину выбор покупателя 
function update(id, quantity)
{
    // продолжать только если в xmlHttp не пустая ссылка 
    if (xmlHttp)
    {
        // если был принят не пустой аргумент, помещаем его в кэш в виде
        // строки запроса, который будет послан серверу для проверки
        if(quantity)
        {
        // преобразовать значения, в форму, которая безопасно 
        // может быть включена в строку запроса HTTP
        id = encodeURIComponent(id);
        quantity = encodeURIComponent(quantity);
        // добавить значения в очередь
        cache.push("id=" + id + "&quantity=" + quantity);
        }
        // попытаться установить соединение с сервером
        try
        {
             // продолжать только если объект XMLHttpRequest не занят
             // и кэш не пуст
            if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0)&& cache.length > 0)
            {
                 // извлечь новый набор параметров из кэша
                var cacheEntry = cache.shift();
                // послать запрос серверу 
                xmlHttp.open("POST", serverAddress, true);
                xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlHttp.onreadystatechange = handleRequestStateQuantity;
                xmlHttp.send(cacheEntry);
            }
        }
        catch (e)
        {
            // вывести сообщение об ошибке при неудачной попытке установить соединение с сервером
            displayError(e.toString());
        }
    }
}

// эта функция обслуживает ответы для функции  update()
function handleRequestStateQuantity() 
{
    // когда readyState = 4, мы можем прочитать ответ сервера
    if (xmlHttp.readyState == 4) 
    {
        // продолжать, только если статус HTTP равен «OK»
        if (xmlHttp.status == 200) 
        {
            try
            {
                // прочитать ответ, полученный от сервера
                readQuantity();
            }
            catch(e)
            {
                 // вывести сообщение об ошибке
                 displayError(e.toString());
            }
        }
        else
        {
            // вывести сообщение об ошибке
            displayError(xmlHttp.statusText);
        }
    }
}

// читает ответ сервера для функции  update()
function readQuantity()
{
    // получить ответ сервера
    var response = xmlHttp.responseText;
    // ошибка сервера?
    if (response.indexOf("ERRNO") >= 0 
        || response.indexOf("error:") >= 0
        || response.length == 0)
    throw(response.length == 0 ? "Server error." : response);
    responseXml = xmlHttp.responseXML;
    xmlDoc = responseXml.documentElement;
    allsum = xmlDoc.getElementsByTagName("allsum")[0].firstChild.data;
    if (status != "0") 
    {
        total = document.getElementById("totalSum").innerHTML = allsum; 
    }
    setTimeout("update();", 500);
}











