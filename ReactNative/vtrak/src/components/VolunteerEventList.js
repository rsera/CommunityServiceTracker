import React, { Component } from 'react';
import { View, Text, ScrollView } from 'react-native';
import EventCard from './EventCard';
import WelcomeUser from './WelcomeUser';

class VolunteerEventList extends Component {
  componentWillMount() {
     console.log('componentWillMount in Volunteer Event List');
  }
  
  render() {
    return (
      <ScrollView>
        <WelcomeUser />
        <View style={styles.containerStyle}>
          <Text style={styles.listHeaderStyle}>
            Recent History
          </Text>
          <EventCard /> 
          <EventCard />
          <EventCard />
        </View>
      </ScrollView>
    );
  }
}

const styles = {
  containerStyle: {
    marginLeft: 10,
    marginTop: 5
  },
  listHeaderStyle: {
    fontFamily: 'System',
    fontSize: 23,
    color: '#368F8B',
    fontWeight: '500'
  }
};

export default VolunteerEventList;