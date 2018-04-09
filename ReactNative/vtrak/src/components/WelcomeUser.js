import React from 'react';
import { Text, View } from 'react-native';

const WelcomeUser = () => {
	return (
		<View style={styles.welcomeContainerStyle}>
			<Text style={styles.welcomeTextStyle}>
				◄  Welcome, vtrak-user!  ► 
			</Text>
		</View>
	);
};

const styles = {
	welcomeContainerStyle: {
		backgroundColor: '#246A73',
		height: 25,
		width: '95%',
		borderRadius: 15,
		alignItems: 'center',
		justifyContent:'center',
		marginLeft: 5,
		marginRight: 5,
		marginBottom: 10
	},

	welcomeTextStyle: {
		textAlign: 'center',
		fontFamily: 'sansation',
		fontSize: 17,
		color: '#FFFFFF'
	}
};

export default WelcomeUser;