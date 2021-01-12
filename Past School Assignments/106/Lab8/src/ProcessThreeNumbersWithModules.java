import javax.swing.JOptionPane;
import java.util.Arrays;

/* The purpose of this program is to take in a set of numbers and order them from smallest to largest */

public class ProcessThreeNumbersWithModules {
	public static void main(String[] args) {
		int[] x`x`;
		
		arrayNumbers = readNumbers();
		
		while (arrayNumbers[0] != 0 && arrayNumbers[1] != 0 && arrayNumbers[2] != 0) {
			arrayNumbers = sortNumbers(arrayNumbers);
			printNumbers(arrayNumbers);
			arrayNumbers = readNumbers();
		}
	}
	
	public static int[] readNumbers() {
		final int NUM_NUMBERS = 3;
		int[] arrayNumbers = new int[NUM_NUMBERS];
		for (int x = 1; x <= arrayNumbers.length; x++) {
			arrayNumbers[x - 1] = Integer.parseInt(JOptionPane.showInputDialog("Please enter number " + x));
		}
		
		return arrayNumbers;
	}
	
	public static int[] sortNumbers(int[] arrayNumbers) {
		int tempValue;
		
		// If the first element is greater than the second element, swap the two values
		if (arrayNumbers[0] > arrayNumbers[1]) {
			tempValue = arrayNumbers[0];
			arrayNumbers[0] = arrayNumbers[1];
			arrayNumbers[1] = tempValue;
		}
		
		// If the second element is greater than the third element, swap the two values
		if (arrayNumbers[1] > arrayNumbers[2]) {
			tempValue = arrayNumbers[1];
			arrayNumbers[1] = arrayNumbers[2];
			arrayNumbers[2] = tempValue;
		}		
		
		// If the first element is greater than the second element, swap the two values
		if (arrayNumbers[0] > arrayNumbers[1]) {
			tempValue = arrayNumbers[0];
			arrayNumbers[0] = arrayNumbers[1];
			arrayNumbers[1] = tempValue;
		}
	
		return arrayNumbers;
	}
	
	public static void printNumbers(int[] arrayNumbers) {
		JOptionPane.showMessageDialog(null, Arrays.toString(arrayNumbers));
	}
}