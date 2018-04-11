import React, { Component } from 'react';
import { View, Text, ScrollView } from 'react-native';
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

        <ScrollView>
            <EventCard />
            <EventCard />
            <EventCard />
        </ScrollView>

      </View>
    );
  }
}

const styles = {
  containerStyle: {
    marginLeft: 10,
    marginTop: 5,
  },
  listHeaderStyle: {
    fontFamily: 'System',
    fontSize: 23,
    color: '#45537A',
    fontWeight: '500',
    marginBottom: 3,
    fontWeight: 'bold',
  }
};

export default VolunteerEventList;
