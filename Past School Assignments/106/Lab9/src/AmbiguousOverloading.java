import javax.swing.JOptionPane;

public class AmbiguousOverloading {
	public static void main(String[] args) {
		JOptionPane.showMessageDialog(null, max(1, 2));  
	}
	
	public static double max(int num1, double num2) { 
		double maxNum;
		if (num1 > num2) {
			maxNum = num1;
		}
		else {
			maxNum = num2;
		}
		return maxNum;
	}
  
	public static double max(double num1, int num2) {
		double maxNum;
		if (num1 > num2) {
			maxNum = num1;
		}
		else {
			maxNum = num2;     
		}
		return maxNum;
	}
}


