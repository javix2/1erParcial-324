# -*- coding: utf-8 -*-
"""
Created on Mon Apr 18 09:54:36 2022

@author: javier
"""

import psycopg2 as pc
conexion = pc.connect(user="postgres",
                      password="123456",
                      host="127.0.0.1",
                      port="5432",
                      database="academicoDB")
cursor = conexion.cursor()
"""sql = "select * from persona" """

sql = ("""select 
             case P.departamento when '01' then 'Chuquisaca'
    				
				when '02' then 'La Paz'
				when '03' then 'Cochabamba'
				when '04' then 'Oruro'
				when '05' then 'Potosi'
				when '06' then 'Tarija'
				when '07' then 'Santa Cruz'
				when '08' then 'Beni'
				when '09' then 'Pando'
					end
        , avg(notafinal)
        from persona P
        inner join inscripcion I on P.ci = I.ci_per
        group by P.departamento
        order by P.departamento """)

cursor.execute(sql)
registros = cursor.fetchall()
print(registros)
cursor.close()
conexion.close()




