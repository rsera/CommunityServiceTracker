import React, { Component } from 'react';
import { View, StyleSheet } from 'react-native';
import Button from './common/Button';
import Card from './common/Card';
import CardSection from './common/CardSection';
import Input from './common/Input';
import Header from './header.js';
import { Actions } from 'react-native-router-flux';

class AddEvent extends Component {
	state = { organization: '', date: '', hours: '', notes: '' }

	submitEvent = () => {
		alert('Nice work!',
					[ {text: 'Nice work!', onPress: () => Actions.homescreen() } ]
		);
	}

	render() {
		return(
			<View>
			<Header headerText={'vTrak'} />
				<Card>
					<CardSection>
						<Input
							label="Event"
							placeholder="Junior Knights"
							value={this.state.organization}
							onChangeText={organization => this.setState({ organization })}
						/>
					</CardSection>

					<CardSection>
						<Input
							label="Date"
							placeholder="mm/dd/yyyy"
							value={this.state.date}
							onChangeText={date => this.setState({ date })}
						/>
					</CardSection>

					<CardSection>
						<Input
							label="Hours"
							placeholder="5"
							keyboardType="numeric"
							value={this.state.hours}
							onChangeText={hours => this.setState({ hours })}
						/>
					</CardSection>

					<CardSection>
						<Input
							multiline = {true}
         			numberOfLines = {4}
							label="Notes"
							placeholder="Taught high schoolers."
							value={this.state.notes}
							onChangeText={notes => this.setState({ notes })}
						/>
					</CardSection>
				</Card>

				<View style={styles.buttonContainerStyle}>
					<Button onPress={() => Actions.homescreen()}
						title="Add New Event"
						// onPress={this.submitEvent}
					>
						Submit
					</Button>
				</View>

			</View>
		);
	}
}

const styles = StyleSheet.create({
  buttonContainerStyle: {
		height: 40,
		marginTop: 5,
    marginBottom: 5,
  }
});

export default AddEvent;
