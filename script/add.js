// ���������� ��� �������� ������ �� ������ XMLHttpRequest
var xmlHttp = createXmlHttpRequestObject();
// ���������� ��� �������� ������ ���������� �������
var serverAddress = "ajax.php";
// ���� ����������� �������� true, ��������� ��������� ��������� �� �������
var showErrors = true;
// ���������������� ��� ��������
var cache = new Array();


////////////////////����� �������/////////////////////////////////////


// ������� ��������� ������� XMLHttpRequest
function createXmlHttpRequestObject() 
{
    // ���������� ��� �������� ������ �� ������ XMLHttpRequest
    var xmlHttp;
    // ��� ����� ���� ������ �������� �� ���� ���������, �� ����������� 
    // IE6 � ����� ������ ��� ������
    try
    {
        // ���������� ������� ������ XMLHttpRequest
        xmlHttp = new XMLHttpRequest();
    }
    catch(e)
    {
        // ��������������, ��� � �������� �������� ������������
        // IE6 ��� ����� ������ ��� ������
        var XmlHttpVersions = new Array("MSXML2.XMLHTTP.6.0",
                                        "MSXML2.XMLHTTP.5.0",
                                        "MSXML2.XMLHTTP.4.0",
                                        "MSXML2.XMLHTTP.3.0",
                                        "MSXML2.XMLHTTP",
                                        "Microsoft.XMLHTTP");
        // ����������� ��� ��������� prog id, 
        // ���� ����� ���� ������� �� ���������� �������
        for (var i=0; i<XmlHttpVersions.length && !xmlHttp; i++) 
        {
            try 
            { 
            // ���������� ������� ������ XMLHttpRequest 
            xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
            } 
            catch (e) {} //������������ ��������� ������
        }
    }
    // ������� ��������� ������ ��� ������� ��������� �� ������
    if (!xmlHttp)
       displayError("������ �������� ������� XMLHttpRequest.");
    else 
       return xmlHttp;
}

 // ��� ������� ������� ��������� �� ������
function displayError($message)
{
    // ������������ ������, ���� � showErrors ��������� �������� false
    if (showErrors)
    {
        // ��������� ����� ��������� �� �������
        showErrors = false;
        // ������� ��������� �� ������
 
        alert("���������� ������: \n" + $message);
        // ��������� �������� �� �����, ��� ����� 10 ������
        setTimeout("add();", 10000);
        setTimeout("update();", 10000);
        setTimeout("clearCart();", 10000);
    }
}



// ��� ������� ���������� ������ �� ������, ��������� � ������� ����� ���������� 
function add(id, price)
{
    // ���������� ������ ���� � xmlHttp �� ������ ������ 
    if (xmlHttp)
    {
        // ���� ��� ������ �� ������ ��������, �������� ��� � ��� � ����
        // ������ �������, ������� ����� ������ ������� ��� ��������
        if (id)
        {
        // ������������� ��������, � �����, ������� ��������� 
        // ����� ���� �������� � ������ ������� HTTP
        id = encodeURIComponent(id);
        // �������� �������� � �������
        cache.push("id=" + id);
        }
        // ���������� ���������� ���������� � ��������
        try
        {
             // ���������� ������ ���� ������ XMLHttpRequest �� �����
             // � ��� �� ����
            if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0)&& cache.length > 0)
            {
                 // ������� ����� ����� ���������� �� ����
                var cacheEntry = cache.shift();
                // ������� ������ ������� 
                xmlHttp.open("POST", serverAddress, true);
                xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlHttp.onreadystatechange = handleRequestStateChange;
                xmlHttp.send(cacheEntry);
            }
        }
        catch (e)
        {
            // ������� ��������� �� ������ ��� ��������� ������� ���������� ���������� � ��������
            displayError(e.toString());
        }
    }
}

// ��� ������� ����������� ������ ��� ������� add()
function handleRequestStateChange() 
{
    // ����� readyState = 4, �� ����� ��������� ����� �������
    if (xmlHttp.readyState == 4) 
    {
        // ����������, ������ ���� ������ HTTP ����� �OK�
        if (xmlHttp.status == 200) 
        {
            try
            {
                // ��������� �����, ���������� �� �������
                readResponse();
            }
            catch(e)
            {
                 // ������� ��������� �� ������
                 displayError(e.toString());
            }
        }
        else
        {
            // ������� ��������� �� ������
            displayError(xmlHttp.statusText);
        }
    }
}

// ������ ����� ������� ��� ������� add()
function readResponse()
{
    // �������� ����� �������
    var response = xmlHttp.responseText;
    // ������ �������?
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


// ��� ������� ���������� ������ �� ������, ��������� � ������� ����� ���������� 
function update(id, quantity)
{
    // ���������� ������ ���� � xmlHttp �� ������ ������ 
    if (xmlHttp)
    {
        // ���� ��� ������ �� ������ ��������, �������� ��� � ��� � ����
        // ������ �������, ������� ����� ������ ������� ��� ��������
        if(quantity)
        {
        // ������������� ��������, � �����, ������� ��������� 
        // ����� ���� �������� � ������ ������� HTTP
        id = encodeURIComponent(id);
        quantity = encodeURIComponent(quantity);
        // �������� �������� � �������
        cache.push("id=" + id + "&quantity=" + quantity);
        }
        // ���������� ���������� ���������� � ��������
        try
        {
             // ���������� ������ ���� ������ XMLHttpRequest �� �����
             // � ��� �� ����
            if ((xmlHttp.readyState == 4 || xmlHttp.readyState == 0)&& cache.length > 0)
            {
                 // ������� ����� ����� ���������� �� ����
                var cacheEntry = cache.shift();
                // ������� ������ ������� 
                xmlHttp.open("POST", serverAddress, true);
                xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlHttp.onreadystatechange = handleRequestStateQuantity;
                xmlHttp.send(cacheEntry);
            }
        }
        catch (e)
        {
            // ������� ��������� �� ������ ��� ��������� ������� ���������� ���������� � ��������
            displayError(e.toString());
        }
    }
}

// ��� ������� ����������� ������ ��� �������  update()
function handleRequestStateQuantity() 
{
    // ����� readyState = 4, �� ����� ��������� ����� �������
    if (xmlHttp.readyState == 4) 
    {
        // ����������, ������ ���� ������ HTTP ����� �OK�
        if (xmlHttp.status == 200) 
        {
            try
            {
                // ��������� �����, ���������� �� �������
                readQuantity();
            }
            catch(e)
            {
                 // ������� ��������� �� ������
                 displayError(e.toString());
            }
        }
        else
        {
            // ������� ��������� �� ������
            displayError(xmlHttp.statusText);
        }
    }
}

// ������ ����� ������� ��� �������  update()
function readQuantity()
{
    // �������� ����� �������
    var response = xmlHttp.responseText;
    // ������ �������?
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











