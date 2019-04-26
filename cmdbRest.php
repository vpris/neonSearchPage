<?php

#В заголовке запроса необходимо указать Content-Type: application/json. Метод POST. Запрос JSON. Ответ JSON.

# Выполняем авторизацию на сервере CMDB. Для этого нужно выполнить запрос /authenticate. В результате запроса возвращается ключ авторизации, который необходимо подставлять в заголовки других запросов.
$URLAuth = "http://s-msk-t-ucmdb.raiffeisen.ru:8080/rest-api/authenticate"; #URL авторизации и аутентификации 
$URLQuery ="http://s-msk-t-ucmdb.raiffeisen.ru:8080/rest-api/topologyQuery"; # URL для выполнения запросов в базу CMDB
$Usr = 'user'; #username на сервере CMDB. Создается отдельно
$pwd = 'password'; #пароль для созданного пользователя на сервере CMDB
$token = $tkn.token; #Генерируем токен
$Server_name = 's-msk-p-appsd'; # Требуемый сервер


	# получаем токен
	$body = '{"username":"'+ $Usr +'", "password":"' + $pwd +'", "clientContext": 1}'; #Формируем тело запроса для токена вида: пользователь+пароль+контекст[integer]
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");


    #Оформляем заголовок 
	$Tkn = Invoke-WebRequest -URI $URLAuth -Method POST -Body $Body -Headers $headers; #Авторизуемся в CMDB.

    if ($Tkn.token.Length -gt 0) {
        $Token=$tkn.token;
	}
	else {
		throw "Token is not received";  #Добавляем проверку корректного формирования токена.
	} 
 
 # Формируем запрос:
$Body = '{
        "nodes":
        [{
            "type": "node",
            "queryIdentifier": "server",
            "visible": true,
            "includeSubtypes": true,
            "layout": ["name"],
            "attributeConditions":
                [{
                    "attribute": "name",
                    "operator": "equals",
                    "value": "'+$Server_name+'"
                    }],
            "linkConditions":
                [{
                        "linkIdentifier": "OS_Support",
                        "minCardinality": "0",
                        "maxCardinality": "*"
                    },
                 
                    {
                        "linkIdentifier": "OS_Support_Delegate",
                        "minCardinality": "0",
                        "maxCardinality": "*"
                    }
                ]
            },
            {
            "type": "person",
            "queryIdentifier": "Support",
            "visible": true,
            "includeSubtypes": true,
            "layout": ["display_label"],
            "linkConditions":
                [
                    {
                        "linkIdentifier": "OS_Support",
                        "minCardinality": "1",
                        "maxCardinality": "*"
                    }
                ]
            },
            {
            "type": "person",
            "queryIdentifier": "Support_Delegate",
            "visible": true,
            "includeSubtypes": true,
            "layout": ["display_label"],           
            "linkConditions":
                [
                    {
                        "linkIdentifier": "OS_Support_Delegate",
                        "minCardinality": "1",
                        "maxCardinality": "*"
                    }
                ]
            }   
        ],
        "relations":
            [
                {
                    "queryIdentifier": "OS_Support",
                    "type": "rbru_os_support",
                    "visible": true,
                    "includeSubtypes": true,
                    "from": "Support",
                    "to": "server"
                },
             
                {
                    "queryIdentifier": "OS_Support_Delegate",
                    "type":    "rbru_os_support_delegate",           
                    "visible": true,
                    "includeSubtypes": true,
                    "from": "Support_Delegate",
                    "to": "server"
                }
            ]
    }'

    #Формируем заголовок запроса
	$Headers = @{
	"Content-Type" = "application/json";
	"Authorization" = "Bearer " + $tkn.token}
    #Выполняем запрос 
	$data = Invoke-WebRequest -URI $URLQuery -Method POST -Body $Body -Headers $headers;

#Документация по REST для UCMDB: https://docs.microfocus.com/UCMDB/11.0/ucmdb-docs/docs/eng/doc_lib/Content/REST_API/REST_API_Reference.htm

#формируем выходные данные
    $support_name = "";
    $support_login = "";
    $support_email = "";
    $delegate_name = "";
    $delegate_login = "";
    $delegate_email = "";
    $support_group = "";
    $number_of_support= "";
    $number_of_delegate = "";
    $number_of_group = "";
    $Find_server = "";
    $sep_sup = "";
    $sep_del = "";
    $sep_gr = "";
    $support_Count = 0;
    $delegate_Count = 0;
    $support_group_Count = 0;
    $server_count = 0;
    

      foreach ($cis in $data.cis)
    {
        
        foreach ($rel in $data.relations)
        {
            if($cis.ucmdbId -match $rel.end1Id -and $rel.type -eq "rbru_os_support")
                {
                $support_name += "$sep_sup$($cis.properties.full_name)"
                $support_login += "$sep_sup$($cis.properties.name) "
                $support_email += "$sep_sup$($cis.properties.primary_email)"
                $support_Count++
                $sep_sup = ", "
                }
            if($cis.ucmdbId -match $rel.end1Id -and $rel.type -eq "rbru_os_support_delegate")
                {
                $delegate_name += "$sep_del$($cis.properties.full_name)"
                $delegate_login += "$sep_del$($cis.properties.name)"
                $delegate_email += "$sep_del$($cis.properties.primary_email)"
                $delegate_Count++
                $sep_del = ", "
                }

            
        }
        if($cis.type -eq "rbru_itsm_support_group")
          {
          $support_group += "$sep_gr$($cis.properties.display_label)";
          $support_group_Count++;
          $sep_gr = ", ";
          }
        if($cis.properties.name -eq "$Server_Name")
          {
          $Server_Count++;
          }
    }
if($delegate_Count -eq 0)
{
    $number_of_delegate += "Not found";
}  
elseif($delegate_Count -eq 1)
{
    $number_of_delegate += "OK";
}
else
{
    $number_of_delegate += "Multiple";
}
if($support_group_Count -eq 0)
{
    $number_of_group += "Not found";
}  
elseif($support_group_Count -eq 1)
{
    $number_of_group += "OK";
}
else
{
    $number_of_group += "Multiple";
}
if($support_Count -eq 0)
{
    $number_of_support += "Not found";
}  
elseif($support_Count -eq 1)
{
    $number_of_support += "OK";
}
else
{
    $number_of_support += "Multiple";
} 
if($Server_Count -eq 0)
{
    $Find_server += "Not found";
}  
elseif($Server_Count -eq 1)
{
    $Find_server += "OK";
}
else
{
    $Find_server += "Multiple";
} 
