import React from 'react';
import { View,Text } from 'react-native';
import HoursIcon from './HoursIcon';

const EventCard = () => {
	const {
		containerStyle,
		textContainerStyle,
		descriptionStyle,
		locationStyle,
		hoursStyle
	} = styles;

	return (
		<View style={containerStyle}>
			<View style={textContainerStyle}>
				<Text style={descriptionStyle}> 
					Volunteer Description 
				</Text>
				<Text style={locationStyle}>
					Location
				</Text>
			</View>
			<View style={hoursStyle}>
				<HoursIcon />
			</View>
		</View>
	);
};

const styles = {
	containerStyle: {
		// For the border
		/*
		borderWidth: 1,
		borderRadius: 5, // rounded corners
		borderColor: '#A9A9A9',
		elevation: 1,
		*/
		// marginLeft: 10,
		marginRight: 10,
		marginTop: 7,
		marginBottom: 7,
		flexDirection: 'row',
		position: 'relative'
	},
	textContainerStyle: {
		// to align location and volunteer description
		flexDirection: 'column',
		justifyContent: 'space-around'
	},
	descriptionStyle: {
		fontFamily: 'System',
		fontSize: 19,
		fontWeight: '200'
	},
	locationStyle: {
		fontFamily: 'System',
		fontSize: 17,
		color: '#A9A9A9',
		fontWeight: '200'
	},
	hoursStyle: {
		marginRight: 10,
		marginLeft: 120,
		alignItems: 'flex-end'
	}
};

export default EventCard;