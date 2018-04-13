import React, { Component } from 'react';
import { View, StyleSheet, Text } from 'react-native';
import Button from './common/Button';
import Card from './common/Card';
import CardSection from './common/CardSection';
import Input from './common/Input';
import { Actions } from 'react-native-router-flux';
import Header from './header.js';


class SignUpForm extends Component {
  state = { fname: '',
            lname: '',
            username: '',
            password: '',
            passwordConfirm: '',
            zipcode: '',
            goal: '',
          };

  dbSignup = () => {
    fetch('http://www.aptimage.net/newUserMobile.php',
    {
      method: 'POST',
      headers:
      {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(
      {
        FName : this.state.fname,
        LName : this.state.lname,
        zip : this.state.zipcode,
        username : this.state.username,
        goal : this.state.goal,
        PWHash : this.state.password,
        PWHash2 : this.state.passwordConfirm
      })

    }).then((response) => response.text()).then((responseJsonFromServer) =>
    {
      console.log(responseJsonFromServer);
      Actions.login();
    }).catch((error) =>
    {
      console.log('you failed buddy');
      console.error(error);
    });

    //Actions.homescreen();
}

  render() {
    return (
      <View>
        <Header headerText={'vTrak'} />
        <Card>

        <CardSection>
          <Text style={styles.cardHeaderStyle}>Personal Information</Text>
        </CardSection>

          <CardSection>
            <Input
              label="First Name"
              value={this.state.fname}
              onChangeText={fname => this.setState({ fname })}
            />
          </CardSection>

          <CardSection>
            <Input
              label="Last Name"
              value={this.state.lname}
              onChangeText={lname => this.setState({ lname })}
            />
          </CardSection>

          <CardSection>
            <Input
              label="Username"
              value={this.state.username}
              onChangeText={username => this.setState({ username })}
            />
          </CardSection>

          <CardSection>
            <Input
              secureTextEntry
              label="Password"
              value={this.state.password}
              onChangeText={password => this.setState({ password })}
            />
          </CardSection>

          <CardSection>
            <Input
              secureTextEntry
              label="Retype Password"
              value={this.state.passwordConfirm}
              onChangeText={passwordConfirm => this.setState({ passwordConfirm })}
            />
          </CardSection>

          <CardSection>
            <Input
              label="Zipcode"
              value={this.state.zipcode}
              onChangeText={zipcode => this.setState({ zipcode })}
            />
          </CardSection>

        </Card>

        <Card>
          <CardSection>
            <Text style={styles.cardHeaderStyle}>Set your goal!</Text>
          </CardSection>
          <CardSection>
            <Input
              label="Goal"
              value={this.state.goal}
              onChangeText={goal => this.setState({ goal })}
            />
          </CardSection>
        </Card>

        <View style={styles.buttonContainerStyle}>

          <Button onPress={this.dbSignup}>
            Create Account and Start Volunteering!
          </Button>
        </View>

      </View>
    );
  }
}

const styles = StyleSheet.create({
  buttonContainerStyle: {
    height: 45,
    marginTop: 10,
    marginBottom: 5,
  },
  cardHeaderStyle: {
    fontSize: 16,
    fontWeight: 'bold'
  }
});

export default SignUpForm;
