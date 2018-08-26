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
            get { return Salary_ ;}
            set
            {
                if(value <20000 || value >40000)
                {
                   
                    Console.Write("\t "+this.Ename + "\t "+value );
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
            Console.Write("\t "+this.Ename + "\t "+this.Salary+"\n");
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
            int member=0;
            Emplyee Emplyee_member = new Emplyee();
            
            Console.Write("請輸入員工人數：");
            member = int.Parse (Console.ReadLine());
            string[] Ename = new string[member];
            int[] Salary = new int[member];
            
            for (int i = 0; i < member; i++ )
            {
                Console.Write("\n第" + (i + 1) + "位" + "員工姓名：");
                Ename[i] = Console.ReadLine();
                Console.Write("薪資（20,000~40,000）：");
                Salary[i] = int.Parse (Console.ReadLine());
            }

            Console.Write("\n= = = 輸入完畢，顯示輸入的資料 = = =\n\n");
            Console.Write("\t姓名\t薪資\n");
            Console.Write("--------------------------------\n");
            
            for(int i=0 ; i<member ;i++)
            {
                Emplyee_member.Ename_list(Ename[i], Salary[i]);
            }
            

           // Emplyee_member.Ename_list("a", 1000);
           //Emplyee_member.printData();
            Console.Read();
        }
    }
}
