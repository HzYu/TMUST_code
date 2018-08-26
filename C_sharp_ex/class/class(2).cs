using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication7
{
    class score
    {
        public string student;
        public double program;
        public double web;
        public double database;

        public void student_list (string stud , double pro , double web_ , double data)
        {
            this.student = stud;
            this.program = pro; 
            this.web = web_;
            this.database = data;
        }
    
        public double total()
        {
            double total;
            total = this.program + this.web + this.database;
            return total;
        }
        
        public double avg (double total)
        {
            double avg;
            avg = total / 3;
            return avg;
        }

        public void print ()
        {
            Console.Write("  "+this.student+"\t       "+this.program+"\t   "+this.web+"\t      "+this.database +"\t"+total()+"\t "+ avg(total())+"\n");
        }
    }


    class Program
    {
        static void Main(string[] args)
        {
            score sc = new score();
            Console.Write("學生姓名    程式設計    網頁設計    資料庫      總分    平均\n");
            sc.student_list("Chiu", 95.0, 90.0, 85.0);
            sc.print();
            sc.student_list("Yeh",88.5, 87.5, 86.5);
            sc.print();
            sc.student_list("Lee", 100, 98, 99);
            sc.print();
            sc.total();
            sc.avg(sc.total());
            Console.Read();
        }
    }
}
