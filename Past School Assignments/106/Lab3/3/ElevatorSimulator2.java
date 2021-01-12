import javax.swing.JOptionPane;

/*
	This program enhances the previous elevator simulator by performing
	some input validation
*/

public class ElevatorSimulator2 {
	public static void main(String[] args) {
		String floorInput = JOptionPane.showInputDialog("Enter your floor:");
		final int MINIMUM_FLOOR = 1;
		final int MAXIMUM_FLOOR = 20;
		
		// Try to run this code
		try {
			int floor = Integer.parseInt(floorInput);
			
			if (floor == 13) {
				JOptionPane.showMessageDialog(null, "Error: There is no 13th floor.");		
			}
			// input range checking
			else if (floor < MINIMUM_FLOOR || floor > MAXIMUM_FLOOR) {
				JOptionPane.showMessageDialog(null, "Error: You entered an invalid floor number.");
			}
			//Else, no errors. Show the floor
			else {
				int actualFloor = floor;
				if (floor > 13) {
					actualFloor = floor - 1;
				}
				JOptionPane.showMessageDialog(null,
					"The elevator will travel to the actual floor: " + actualFloor);
			}
		}
		
		// If there is an error parsing the number, let the user know
		catch (NumberFormatException e) {
			JOptionPane.showMessageDialog(null, "Error: Floors must be numbers only!");
		}
	}
}

