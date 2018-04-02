import React from 'react';
import { View, Image } from 'react-native';

const ProfileIcon = () => {
	var iconPicture = require ( './person-icon.jpg' );
	return (
		<Image 
			style={styles.iconContainerStyle}  
			source={iconPicture}
		/>
	);
};

const styles = {
	iconContainerStyle: {
		justifyContent: 'center',
		alignItems: 'flex-start',
		marginLeft: 10,
		marginRight: 10,
		marginTop: 15,
		height: 45,
		width: 45,
		borderRadius: 22.5,

		// For white border
		borderWidth: 2,
		borderColor: '#FFFFFF'
	}
};

export default ProfileIcon;