import javax.swing.JOptionPane;

/*
	This program simulates an elevator panel that skips the 13th floor
*/

public class ElevatorSimulator {
	public static void main(String[] args) {
		int floor = Integer.parseInt(JOptionPane.showInputDialog("Enter your floor:"));
		
		// Adjust the floor if necessary
		
		int actualFloor;
		
		if (floor > 13) {
			actualFloor = floor - 1;
		}
		else {
			actualFloor = floor;
		}
		
		JOptionPane.showMessageDialog(
			null, "The elevator will travel to the actual floor: " + actualFloor);
	}
}

