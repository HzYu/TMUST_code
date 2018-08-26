using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication8
{

    class Emplyee
    {
        public string Ename;
        private int Salary_;

        public void Ename_list(string Ename, int Salary)
        {
            this.Ename = Ename;
            this.Salary = Salary;
        }

        public int Salary
        {
            get { return Salary_; }
            set
            {
                if (value < 20000 || value > 40000)
                {

                    Console.Write("\t " + this.Ename + "\t " + value );
                    this.ShowError();
                }
                else
                {
                    Salary_ = value;
                    printData();
                }
            }
        }

        public void printData()
        {
            Console.Write("\t " + this.Ename + "\t " + this.Salary + "\n");
        }

        public void ShowError()
        {
            Console.Write("  （薪水必須介於20000到40000之間）\n");
        }

    }

    class Program
    {
        static void Main(string[] args)
        {
            int member = 0;
            Emplyee Emplyee_member = new Emplyee();

            Console.Write("請輸入員工人數：");
            member = int.Parse(Console.ReadLine());
            string[] Ename = new string[member];
            int[] Salary = new int[member];

            for (int i = 0; i < member; i++)
            {
                Console.Write("\n第" + (i + 1) + "位" + "員工姓名：");
                Ename[i] = Console.ReadLine();
                Console.Write("薪資（20,000~40,000）：");
                Salary[i] = int.Parse(Console.ReadLine());
            }

            Console.Write("\n= = = 輸入完畢，顯示輸入的資料 = = =\n\n");
            Console.Write("\t姓名\t薪資\n");
            Console.Write("--------------------------------\n");

            for (int i = 0; i < member; i++)
            {
                Emplyee_member.Ename_list(Ename[i], Salary[i]);
            }

            //搜尋
            string Search_Ename="";
            bool c = false;
            Console.Write("\n請輸入欲查詢的員工姓名：");
            Search_Ename = Console.ReadLine();

            for (int i = 0; i < member; i++)
            {
                if(Ename [i] == Search_Ename )
                {
                    c = true;
                    Console.Write("\n找到第" + (i+1) + "位 員工的資料 " + Search_Ename +"\n");
                    Console.Write("\n \t姓名\t薪資\n");
                    Console.Write("--------------------------------\n");
                    Console.Write("\n \t" + Ename[i] + "\t" + Salary[i]+"\n");
            
                }
            }
            if (c == false)
            {
                    Console.Write("\n未找到該名員工");
            }
                Console.Read();
        }
    }
}