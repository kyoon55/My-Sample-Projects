import javax.swing.JOptionPane;
public class PartiallyFilledArray {
	public static void main (String [] args) {
		final int ARRAY_LENGTH = 5;
		double[] data = new double[ARRAY_LENGTH];
		int currentSize = 0;
		
		// Perform a priming read to get the first number
		String strNumber = JOptionPane.showInputDialog("Enter number: ");
		
		// While the number entered is not empty, continue processing numbers
		while (!strNumber.equals("")) {
			// If the array is not filled, add the number to the array
			if (currentSize < data.length) {
				data[currentSize] = Double.parseDouble(strNumber);
				++currentSize;
			}
			// Otherwise inform the user the array is full
			else {
				JOptionPane.showMessageDialog(null, "The array is already full.");
			}
			
			// Prompt the user for the next number
			strNumber = JOptionPane.showInputDialog("Enter number: ");
		}
		
		JOptionPane.showMessageDialog(null, "Number of array elements: " + currentSize);
		
		String arrayElements = "";
		for (int x = 0; x < currentSize; x++) {
			// Append individual array value to a string
			arrayElements += data[x] + "  ";
		}
		JOptionPane.showMessageDialog(null, arrayElements);
		
	}
}


