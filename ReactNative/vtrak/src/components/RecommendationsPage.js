import React from 'react';
import { View, Text, ScrollView } from 'react-native';
import Header from "./header";
import RecommendationCard from './RecommendationCard';

const RecommendationsPage = () => {
	return (
		<View style={{flex:1, backgroundColor: '#F9F9F9'}}>
			<Header headerText={'vTrak'} />

			<View style={styles.textStyle}>
				<Text style={styles.pageTitle}>Recommendations</Text>
				<Text style={styles.subTitle}>Check out other volunteer opportunities in your area!</Text>
			</View>

			<ScrollView>
				<View style={styles.cardContainerStyle}>
					<View>
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
						<RecommendationCard />
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
		marginLeft: 7,
		marginRight: 7,
		flex: 1
	},
	textStyle: {
		borderBottomWidth: 2,
		borderBottomColor: '#C3E8AB'
	},
	pageTitle: {
		marginLeft: 10,
		fontFamily: 'System',
		fontSize: 23,
		color: '#45537A',
		fontWeight: '500',
		marginBottom: 3,
		fontWeight: 'bold'
	},
	subTitle: {
		marginLeft: 10,
		paddingBottom: 10,
		paddingTop: 5,
		fontFamily: 'System'
	}
};

export default RecommendationsPage;
