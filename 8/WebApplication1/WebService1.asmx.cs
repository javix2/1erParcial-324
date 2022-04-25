using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using System.Data;
using System.Data.SqlClient;

namespace WebApplication1
{
    /// <summary>
    /// Descripción breve de WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {

        /*[WebMethod]
        public string HelloWorld()
        {
            return "Hola a todoshhhh";
        }*/

        [WebMethod]
        public DataSet persona()
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=bdacademico;user=ProgM324;pwd=123456";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from persona";
            DataSet ds = new DataSet();
            DataTable dt = new DataTable();
            ada.Fill(ds);
            //dataGridView1.DataSource = ds.Tables[0];
            return ds;
        }

        [WebMethod]
        public DataSet agregar(int ci, string nombre, DateTime fecha, string depto)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=bdacademico;user=ProgM324;pwd=123456";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "insert into persona values('" + ci + "','" + nombre + "','" + fecha + "','" + depto + "')";
            DataSet ds = new DataSet();
            DataTable dt = new DataTable();
            ada.Fill(ds);
            return ds;
        }
        [WebMethod]
        public DataSet modificar(int ci, string nombre, DateTime fecha, string depto)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=bdacademico;user=ProgM324;pwd=123456";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "update persona set nombre_completo='" + nombre + "',fecha_nac='" + fecha + "', departamento='"+depto+"' where ci='" + ci + "' ";
            DataSet ds = new DataSet();
            DataTable dt = new DataTable();
            ada.Fill(ds);
            return ds;
        }

        [WebMethod]
        public DataSet buscar1(int ci)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=bdacademico;user=ProgM324;pwd=123456";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from persona where ci='" + ci + "'";
            DataSet ds = new DataSet();
            DataTable dt = new DataTable();
            ada.Fill(ds);
            return ds;
        }
        [WebMethod]
        public DataSet eliminar(int ci)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=bdacademico;user=ProgM324;pwd=123456";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "delete from persona where ci ='" + ci + "'";
            DataSet ds = new DataSet();
            DataTable dt = new DataTable();
            ada.Fill(ds);
            return ds;
        }

    }
}
