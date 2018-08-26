using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace TKMD10516241_2
{
    class CStudent
    {
        private string std_name;
        private double std_math;
        public double std_chin;
        public static  double[] avg = new double[3];
        public CStudent (string name , double chin ,double math)
        {
            this.std_name = name;
            this.std_chin = chin;
            this.std_math = math;
        }
        
        public static void sort(CStudent [] std_arr)
        {
            for (int i=0; i<3;i++)
            {
                avg[i] = (std_arr[i].std_chin + std_arr[i].std_math)/2;
            }

            Array.Sort(avg, std_arr);
            Array.Reverse(std_arr);
        }

        public static void show(CStudent[] std_arr)
        {
            for (int i=0;i<3;i++)
            {
                Console.Write("姓名：" + std_arr[i].std_name + "\n國文：" + std_arr[i].std_chin  + "\n數學：" + std_arr[i].std_math  + "\n平均：" + avg[2-i] + "\n名次：" +"第 " + (i+1)+" 名");
                Console.Write("\n\n");
            }
           
        }

    }
    class Program
    {
        static void Main(string[] args)
        {
            CStudent studend_list1 = new CStudent("chiu", 86.5, 75);
            CStudent studend_list2 = new CStudent("yeh", 94, 88);
            CStudent studend_list3 = new CStudent("lee", 99, 93);

            CStudent[] std_arr = new CStudent[3];
            std_arr[0] = studend_list1;
            std_arr[1] = studend_list2;
            std_arr[2] = studend_list3;

            CStudent.sort(std_arr);

            CStudent.show(std_arr);

            Console.Read();
        }
    }
}
