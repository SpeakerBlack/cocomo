import json, sys, mysql

#print json.dumps({"message":"this is s test"})
mysql.query("select * from cuentas where id in (1,29,30)")