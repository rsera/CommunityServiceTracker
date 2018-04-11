import React, {Component} from 'react';
import { View,Text, ScrollView, TouchableHighlight } from 'react-native';
import HoursIcon from './HoursIcon';

class EventCard extends Component {

	render () {
		return (
			<View style={styles.containerStyle}>
				<View style={styles.panelHeaderStyle}>

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
					<Text style={{textAlign: 'justify'}}>
						yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women yay women
					</Text>
				</View>
			</View>
		);
	}
}

const styles = {
	containerStyle: {
		// Entire event card, header and description

		flexDirection: 'column',
		position: 'relative',
		justifyContent: 'space-between',
		alignItems: 'stretch',
		borderBottomWidth: 2,
		borderBottomColor: '#C3E8AB'
	},
	panelHeaderStyle: {
		flexDirection: 'row',
		justifyContent: 'space-between',
		alignItems: 'stretch',
		marginRight: 10,
		marginTop: 7,
		marginBottom: 7,
		marginLeft: 10
	},
	expandedPanelStyle: {
		marginTop: 5,
		marginBottom: 5,
		marginRight: 10,
		marginLeft: 10,
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
