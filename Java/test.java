public class test {
	public static void main(String[] args) {
		double[] data = {1, 4, 3, 50};
		double largest = data[0];
		for (int i = 1; i < data.length; i++)
		{
		  if (data[i] > largest)
		  {
			largest = data[i];
			
		  }
		}	
		System.out.println(largest);
	}
  }
  