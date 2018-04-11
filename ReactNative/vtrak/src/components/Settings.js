import React, { Component } from 'react';
import { Text, View, StyleSheet, TouchableOpacity } from 'react-native';
import Header from './header.js';
import Button from './common/Button';
import LoginForm from './LoginForm.js';
import { Actions } from 'react-native-router-flux';
import Card from './common/Card.js';
import CardSection from './common/CardSection.js';
import Input from './common/Input';


class Settings extends Component {
  state = { newGoal: '' };

  render() {
    return(
      <View style={{flex: 1}}>

        <Header headerText={'vTrak'} />

        <Text style={styles.pageTitle}>Settings</Text>

        <View style={{flex:1}}>
        <Card>
          <CardSection>
            <Text style={styles.cardHeaderStyle}>Update your goal</Text>
          </CardSection>
          <CardSection>
            <Input
              label="New Goal"
              value={this.state.newGoal}
              onChangeText={newGoal => this.setState({ newGoal })}
            />
          </CardSection>
        </Card>

        <View style={styles.buttonContainerStyle}>
          <Button onPress={() => Actions.homescreen()} title="Update">
            Update
          </Button>
        </View>
        </View>

        <TouchableOpacity>
          <Text style={styles.textStyle} onPress={() => Actions.login()} >
            Logout
          </Text>
        </TouchableOpacity>



      </View>
    );
  }
}

const styles = StyleSheet.create({
  buttonContainerStyle: {
    height: 45,
    marginTop: 5,
    marginBottom: 15
  },
  cardHeaderStyle: {
    fontSize: 16,
    fontWeight: 'bold'
  },
  logoutButton: {
    height: 45,
    marginTop: 5,
    marginBottom: 15
  },
  textStyle: {
    paddingTop: 10,
    paddingBottom: 10,
    alignSelf: 'center',
    fontSize: 16,
    color: 'red',
    fontWeight: 'bold'
  },
  pageTitle: {
    marginLeft: 10,
    fontFamily: 'System',
    fontSize: 23,
    color: '#45537A',
    fontWeight: '500',
    marginBottom: 3,
    fontWeight: 'bold'
  }
});

export default Settings;
