import java.util.*;
public class D10516241
{
	public static void main(String args[])
	{
		//Scanner sc = new Scanner(System.in);
		//n=sc.nextInt();
		int [][][] a = new int [3][2][3];
		int [] z = new int [6];
		
		input (a);
		output(a,z);
		
	}
	public static void input(int [][][] x )
	{		
		for(int k=0;k<x.length ; k++)//3
		{
			System.out.println("第"+(k+1)+"組");
			for(int j=0;j<x[k].length;j++)//2
			{
				for(int i=0;i<x[k][j].length;i++)//3
				{
					Scanner sc = new Scanner(System.in);
					x[k][j][i] =sc.nextInt();
				}
			}
			
			for(int m=0;m<x[k].length;m++)//2
			{
				for(int n=0; n<x[k][m].length ; n++)//3
				{
					System.out.printf("%5s",x[k][m][n]);
				}
				System.out.println();
			}
			
		}	
	}	
		
	public static void output(int [][][] input_a , int [] output_z)
	{
		System.out.println("-------------------");
		int c=0;
		for(int j=0 ; j<input_a[0].length ; j++)//2
		{
			for(int i=0 ; i<input_a[0][j].length ;i++)//3
			{				
				output_z[c] =input_a[0][j][i] + 2*input_a[1][j][i] - 3*input_a[2][j][i];
				System.out.printf("%5s",output_z[c]);
				c++;
			}
		System.out.println();
		}
	}
}

