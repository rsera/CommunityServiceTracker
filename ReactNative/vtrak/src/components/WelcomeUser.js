import React from 'react';
import { Text, View } from 'react-native';

const WelcomeUser = () => {
	return (
		<View style={styles.welcomeContainerStyle}>
			<Text style={styles.welcomeTextStyle}>
				Welcome, Krystal!
			</Text>
		</View>
	);
};

const styles = {
	welcomeContainerStyle: {
		// backgroundColor: '#45537A',
		height: 25,
		// width: '95%',
		// borderRadius: 15,
		alignItems: 'center',
		justifyContent:'center',
		marginLeft: 10,
		marginRight: 10,
	},

	welcomeTextStyle: {
		textAlign: 'left',
		fontFamily: 'sansation',
		fontSize: 16,
		color: '#45537A'
	}
};

export default WelcomeUser;
