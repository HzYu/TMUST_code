import java.util.*;
public class D10516235
{
	public static void main(String args[])
	{
		int i=0,j=0,n=0,sum=0;
		//Scanner sc = new Scanner(System.in);
		//n=sc.nextInt();
		int [][] a = new int [2][3];
		int [][] b = new int [2][3]; 
		int [][] c = new int [2][3];
		
		for(j=0;j<a.length;j++)//2
		{
			for(i=0;i<a[j].length;i++)//3
			{
				Scanner sc = new Scanner(System.in);
				a[j][i] =sc.nextInt();
			}
		}
		
		for(j=0;j<b.length;j++)//2
		{
			for(i=0;i<b[j].length;i++)//3
			{
				Scanner sc = new Scanner(System.in);
				b[j][i] =sc.nextInt();
			}
		}
		
		for(j=0;j<c.length;j++)//2
		{
			for(i=0;i<c[j].length;i++)//3
			{
				c[j][i]=a[j][i]+b[j][i];
				System.out.print(c[j][i]+"  ");
			}
				System.out.println();
		}
	}
}