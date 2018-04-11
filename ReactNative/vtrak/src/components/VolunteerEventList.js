import React, { Component } from 'react';
import { View, Text, ScrollView } from 'react-native';
import EventCard from './EventCard';


class VolunteerEventList extends Component {
  componentWillMount() {
     console.log('componentWillMount in Volunteer Event List');
  }

  render() {
    return (
      <View style={{backgroundColor: '#F9F9F9', flex:1}}>
        <View style={styles.containerStyle}>
          <ScrollView style={{flex:1}}>
              <EventCard />
              <EventCard />
              <EventCard />
              <EventCard />
          </ScrollView>
        </View>
      </View>
    );
  }
}

const styles = {
  containerStyle: {
    marginTop: 5,
    flex:1
  }
};

export default VolunteerEventList;
