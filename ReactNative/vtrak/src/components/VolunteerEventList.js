import React, { Component } from 'react';
import { View, Text } from 'react-native';

class VolunteerEventList extends Component {
  componentWillMount() {
     console.log('componentWillMount in Volunteer Event List');
  }
  
  render() {
    return (
      <View>
        <Text>Volunteer Event List</Text>
      </View>
    );
  }
}

export default VolunteerEventList;