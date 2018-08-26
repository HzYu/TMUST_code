using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Basic_class
{
    class circle
    {

        public double PI;
        public string color;

        private double _radius;
        public double radius        //如果半徑為負值改正值
        {
            get { return _radius; }
            set
            {
                if (value < 0)
                {
                    value = Math.Abs(value);
                }
                _radius = value;
            }
        }

        public void circle1(int rad, string color)
        {
            this.radius = rad;
            this.PI = 3.14;
            this.color = color;
        }

        public double area()  //面積需回傳值
        {
            double area;
            area = radius * radius * PI;
            return area;
        }

        public void circle_print()    //輸出圓的資料
        {
            Console.Write("Circle\n" + "radius：" + this.radius + "\n" + "PI：" + this.PI + "\n" + "color：" + this.color + "\n" + "area：" + area() + "\n");
        }

    }
    class rectangle     //長方形的長寬面積
    {
        public int width;
        public int Length;

        public void rectangle1(int wid, int Len)  
        {
            this.width = wid;
            this.Length = Len;
        }

        public int area()  //長方形面積須回傳值
        {
            int area;
            area = width * Length;
            return area;
        }

        public void rectangle_print()
        {
            Console.Write("Width：" + this.width + "\n" + "Length：" + this.Length + "\n" + "Area：" + area() + "\n");
        }

    }
    class Program
    {
        static void Main(string[] args)
        {
            circle circle_ = new circle();
            rectangle rectangle_ = new rectangle();

            int rad;
            Console.Write("set radius：");
            rad = int.Parse(Console.ReadLine());
            circle_.circle1(rad, "red");
            circle_.area();
            circle_.circle_print();

            Console.WriteLine();

            Console.Write("set radius：");
            rad = int.Parse(Console.ReadLine());
            circle_.circle1(rad, "blue");
            circle_.circle_print();

            Console.WriteLine();

            Console.Write("rectangle\n");
            rectangle_.rectangle1(4, 5);
            rectangle_.area();
            rectangle_.rectangle_print();

            Console.WriteLine();

            Console.Write("rectangle\n");
            rectangle_.rectangle1(7, 8);
            rectangle_.area();
            rectangle_.rectangle_print();
            Console.Read();
        }
    }
}
