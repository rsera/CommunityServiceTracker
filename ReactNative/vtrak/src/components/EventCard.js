import React, {Component} from 'react';
import { View,Text, ScrollView, TouchableHighlight } from 'react-native';
import HoursIcon from './HoursIcon';

const EventCard = ({ experience }) => {
	const { name, expDate, hours, notes } = experience;

		return (
			<View style={styles.containerStyle}>
				<View style={styles.panelHeaderStyle}>

					<View style={styles.textContainerStyle}>
						<Text style={styles.descriptionStyle}>
							{name}

						</Text>
						<Text style={styles.locationStyle}>
							{expDate}
						</Text>
					</View>

					<View>
							<HoursIcon hours={hours}/>
					</View>
				</View>

				<View style={styles.expandedPanelStyle} >
					<Text style={{textAlign: 'justify'}}>
<<<<<<< HEAD
						{notes}
=======
						yay women yay women yay women yay women yay women yay women
>>>>>>> 87a5707baaca90ed66276ad208a51e7d38522188
					</Text>
				</View>
			</View>
		);
};

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
		// marginTop: 5,
		marginBottom: 10,
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
