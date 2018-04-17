import React from 'react';
import { View, Text } from 'react-native';

const HoursIcon = ({hours}) => {
	return (
		<View style={styles.iconContainerStyle}>
			<View style={styles.hoursContainerStyle}>
				<Text style={styles.hoursTextStyle}>
<<<<<<< HEAD
					{hours}
=======
					10
>>>>>>> 87a5707baaca90ed66276ad208a51e7d38522188
				</Text>
			</View>
			<Text style={styles.abbrevTextStyle}>
				hours
			</Text>
		</View>
	);
};

const styles = {
	iconContainerStyle: {
		flexDirection: 'column',
		// alignItems: 'flex-start',
		// marginLeft: 10,
		// marginRight: 10,
		// height: 45,
		// width: 45,
		// borderRadius: 22.5,
		padding: 5,
		backgroundColor: '#C3E8AB',
		borderWidth: .5,
		borderColor: '#76CB89'

		// For white border
		// borderWidth: 1,
		// borderColor: '#FFFFFF'
	},
	hoursContainerStyle: {
		// marginTop: 5
	},
	hoursTextStyle: {
		fontFamily: 'sansation',
		fontSize: 30,
		color: '#45537A',
		// textAlign: 'center'
	},
	abbrevTextStyle: {
		fontFamily: 'sansation',
		fontSize: 11,
		color: '#45537A',
		// textAlign: 'center'
	}
};

export default HoursIcon;
