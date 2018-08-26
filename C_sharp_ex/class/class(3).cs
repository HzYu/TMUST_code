using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{

    class Emplyee
    {
        public string Ename;
        private int salary_;

        public void Ename_list (string Ename,int salary)
        {
            this.Ename = Ename;
            this.salary = salary;
        }

        public int salary
        {
            get { return salary_; }
            set
            {
                if (value<20000 || value >40000)
                {
                
                    Console.Write(this.Ename + " 員工薪水設為" + value + "，結果錯誤，無法設定成功！！\n");
                    ShowError();                 
                }
                else
                {
                    salary_ = value;
                }
            }
        }
        public void ShowError()
        {
            Console.Write("薪水必須介於20000到40000之間");
        }
        public void printData()
        {
            Console.Write("\n"+ Ename + "員工，薪水是" + this.salary );
        }
    }
    class Program
    {
        static void Main(string[] args)
        {
            Emplyee Emp = new Emplyee();
            int salary = 0;
            string name;
            Console.Write("輸入員工姓名：");
            name = Console.ReadLine();
            Console.Write("輸入員工薪水：");
            salary = int.Parse (Console.ReadLine());
            Emp.Ename_list(name,salary);
            Emp.printData();
            Console.Read();
        }
    }
}
