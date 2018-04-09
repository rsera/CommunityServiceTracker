import React, { Component } from 'react';
import Button from './common/Button';
import Card from './common/Card';
import CardSection from './common/CardSection';
import Input from './common/Input';

class AddEvent extends Component {
	state = { organization: '', date: '', hours: '', notes: '' }

	submitEvent = () => {
		alert('submitted');
	}

	render() {
		return(
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
						multiline
						label="Notes"
						placeholder="Taught high schoolers."
						value={this.state.notes}
						onChangeText={notes => this.setState({ notes })}
					/>
				</CardSection>

				<CardSection>
					<Button
						title="Add New Event"
						onPress={this.submitEvent}
					/>
				</CardSection>
			</Card>
		);
	}
}

export default AddEvent;
