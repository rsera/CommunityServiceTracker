import React from 'react';
import { View, Text, ScrollView } from 'react-native';
import Header from "./header";
import RecommendationCard from './RecommendationCard';

const RecommendationsPage = () => {
	return (
		<View>
			<Header headerText={'vTrak'} />
			<View style={styles.recsContainerStyle}>
				<Text style={styles.recsTextStyle}>
					◄  Recommendations  ►
				</Text>
			</View>
			<ScrollView>
				<View style={styles.cardContainerStyle}>
					<View>
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
					</View>
				</View>
			</ScrollView>
		</View>
	);
};

const styles = {
	recsContainerStyle: {
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

	recsTextStyle: {
		textAlign: 'center',
		fontFamily: 'sansation',
		fontSize: 17,
		color: '#FFFFFF'
	},

	cardContainerStyle: {
		marginLeft: 10,
		marginRight: 10,
		flex: 1
	}
};

export default RecommendationsPage;