import React, { Component } from 'react';
import { View, Text } from 'react-native';
import EventCard from './EventCard';

class VolunteerEventList extends Component {
  componentWillMount() {
     console.log('componentWillMount in Volunteer Event List');
  }
  
  render() {
    return (
      <View style={styles.containerStyle}>
        <Text style={styles.listHeaderStyle}>
          Recent History
        </Text>
        <EventCard />
        <EventCard />
        <EventCard />
      </View>
    );
  }
}

const styles = {
  containerStyle: {
    marginLeft: 10
  },
  listHeaderStyle: {
    fontFamily: 'arial',
    fontSize: 23,
    color: '#368F8B',
    fontWeight: 'bold'
  }
};

export default VolunteerEventList;