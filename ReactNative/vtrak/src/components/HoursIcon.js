import React from 'react';
import { View, Text } from 'react-native';

const HoursIcon = () => {
	return (
		<View style={styles.iconContainerStyle}>
			<View style={styles.hoursContainerStyle}>
				<Text style={styles.hoursTextStyle}> 
					100
				</Text>
			</View>
			<Text style={styles.abbrevTextStyle}>
				hrs
			</Text>
		</View>
	);
};

const styles = {
	iconContainerStyle: {
		flexDirection: 'column',
		// alignItems: 'flex-start',
		marginLeft: 10,
		marginRight: 10,
		height: 45,
		width: 45,
		borderRadius: 22.5,

		backgroundColor: '#160F29',

		// For white border
		borderWidth: 1,
		borderColor: '#FFFFFF'
	},
	hoursContainerStyle: {
		marginTop: 5
	},
	hoursTextStyle: {
		fontFamily: 'arial',
		fontSize: 20,
		color: '#FFFFFF',
		textAlign: 'center'
	},
	abbrevTextStyle: {
		fontFamily: 'arial',
		fontSize: 9,
		color: '#FFFFFF',
		textAlign: 'center'
	}
};

export default HoursIcon;