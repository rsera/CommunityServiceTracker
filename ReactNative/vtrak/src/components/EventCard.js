import React, {Component} from 'react';
import { View,Text, ScrollView, TouchableHighlight } from 'react-native';
import HoursIcon from './HoursIcon';
import Collapsible from 'react-native-collapsible';

class EventCard extends Component {

	render () {
		return (
			<View style={styles.containerStyle}>
				<View style={styles.initialPanelStyle}>

					<View style={styles.textContainerStyle}>
						<Text style={styles.descriptionStyle}>
							Volunteer Description
						</Text>
						<Text style={styles.locationStyle}>
							Location
						</Text>
					</View>

					<View>
							<HoursIcon />
					</View>
				</View>

				<View style={styles.expandedPanelStyle} >
					<Text>Extra information about the event, etc etc etc</Text>
					<Text>Extra information about the event, etc etc etc</Text>
					<Text>Extra information about the event, etc etc etc</Text>
					<Text>Extra information about the event, etc etc etc</Text>
				</View>
			</View>
		);
	}
}

const styles = {
	containerStyle: {
		// Entire event card, including extra description
		marginRight: 10,
		marginTop: 7,
		marginBottom: 7,
		flexDirection: 'column',
		position: 'relative',
		justifyContent: 'space-between',
		alignItems: 'stretch',
	},
	initialPanelStyle: {
		flexDirection: 'row',
		justifyContent: 'space-between',
		alignItems: 'stretch'
	},
	expandedPanelStyle: {
		marginTop: 5,
		marginBottom: 5
	},
	textContainerStyle: {
		// to align location and volunteer description
		flexDirection: 'column',
		justifyContent: 'space-around',

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
	}
};

export default EventCard;
