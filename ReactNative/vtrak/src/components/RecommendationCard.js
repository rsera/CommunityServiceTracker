import React from 'react';
import { View, Text } from 'react-native';

const RecommendationCard = () => {
	const {
		cardContainerStyle,
		recsNameStyle,
		recsLocationStyle
	} = styles;

	return (
		<View style={cardContainerStyle}>
			<Text style={recsNameStyle}>
				Judy's Pet Shelter
			</Text>
			<Text style={recsLocationStyle}>
				Sanford, FL
			</Text>
		</View>
	);
};

const styles = {
	cardContainerStyle: {
		marginRight: 10,
		marginTop: 7,
		marginBottom: 7,
		flexDirection: 'column',
		justifyContent: 'space-around'
	},

	recsNameStyle: {
		fontFamily: 'System',
		fontSize: 19,
		fontWeight: '200'
	},

	recsLocationStyle: {
		fontFamily: 'System',
		fontSize: 17,
		color: '#A9A9A9',
		fontWeight: '200'
	}
};

export default RecommendationCard;