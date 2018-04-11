import React from 'react';
import { Text, View } from 'react-native';

const RecentHistoryHeader = () => {
	return (
		<View style={styles.headerContainerStyle}>
			<Text style={styles.listHeaderStyle}>
				Recent History
			</Text>
		</View>
	);
};

const styles = {
	headerContainerStyle: {
		marginTop: 5,
		borderBottomWidth: 2,
		borderBottomColor: '#C3E8AB'
	},
	 listHeaderStyle: {
		marginLeft: 10,
    fontFamily: 'System',
    fontSize: 23,
    color: '#45537A',
    fontWeight: '500',
    marginBottom: 3,
    fontWeight: 'bold'
  }
}

export default RecentHistoryHeader;
