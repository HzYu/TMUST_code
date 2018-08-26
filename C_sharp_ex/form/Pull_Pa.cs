using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Pull_Pa
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        int a=0, b=0, c=0, result = 0, grades=1;

        private void Form1_Load(object sender, EventArgs e)
        {
            pictureBox4.Image = Image.FromFile(Application.StartupPath + "\\pic\\1.jpg");
            pictureBox4.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox5.Image = Image.FromFile(Application.StartupPath + "\\pic\\2.jpg");
            pictureBox5.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox6.Image = Image.FromFile(Application.StartupPath + "\\pic\\3.jpg");
            pictureBox6.SizeMode = PictureBoxSizeMode.Zoom;
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            Showpic();
            
            timer1.Interval = 50;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            timer1.Enabled = true;          
        }


        private void button2_Click(object sender, EventArgs e)
        {
            timer1.Enabled = false;
            score();
        }
        public bool Showpic()
        {
            Random rd = new Random();
            a = rd.Next(1, 4);
            b = rd.Next(1, 4);
            c = rd.Next(1, 4);
            pictureBox1.Image = Image.FromFile(Application.StartupPath + "\\pic\\" + a + ".jpg");
            pictureBox1.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox2.Image = Image.FromFile(Application.StartupPath + "\\pic\\" + b + ".jpg");
            pictureBox2.SizeMode = PictureBoxSizeMode.Zoom;
            pictureBox3.Image = Image.FromFile(Application.StartupPath + "\\pic\\" + c + ".jpg");
            pictureBox3.SizeMode = PictureBoxSizeMode.Zoom;
            
            if(a==b && a==c && b==c)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public void score()
        {
            grades = int.Parse(numericUpDown1.Value.ToString());
            if (Showpic() == true)
            {
                if (a == 1)
                {
                    result += grades * 2;
                    textBox1.Text = result.ToString();
                    MessageBox.Show("成功，目前" + result + "分");
                }
                if (a == 2)
                {
                    result += grades * 10;
                    textBox1.Text = result.ToString();
                    MessageBox.Show("成功，目前" + result + "分");
                }
                if (a == 3)
                {
                    result += grades * 15;
                    textBox1.Text = result.ToString();
                    MessageBox.Show("成功，目前" + result + "分");
                }

            }
        }
    }
}
