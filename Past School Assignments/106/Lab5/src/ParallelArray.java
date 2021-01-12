import javax.swing.JOptionPane;

public class ParallelArray {
	public static void main(String[] args) {
		String[] productNames = {"Book", "Pen", "Pencil", "Ruler"};
		//int[] productQuantities = {1, 0, 3};
		
		int[] productQuantities = new int[productNames.length];
		
		for (int j = 0; j < productQuantities.length; j++) {
			productQuantities[j] = Integer.parseInt(JOptionPane.showInputDialog("Enter the quantity for " + productNames[j]));
		}
		
		for (int i = 0; i < productNames.length; i++) {
			JOptionPane.showMessageDialog(null, "Product Name: " + productNames[i]
				+ " - " + productQuantities[i]
			);
		}
	}
}