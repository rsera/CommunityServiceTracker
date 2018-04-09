import React, { Component } from 'react';
import { View } from 'react-native';
import Button from './common/Button';
import Card from './common/Card';
import CardSection from './common/CardSection';
import Input from './common/Input';
import { Actions } from 'react-native-router-flux';
import Header from './header.js';


class SignUpForm extends Component {
  state = { username: '', password: '', passwordConfirm: '', zipcode: '' };

  render() {
    return (
      <View>
        <Header headerText={'vTrak'} />
        <Card>
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
              onChangeText={password => this.setState({ passwordConfirm })}
            />
          </CardSection>

          <CardSection>
            <Input
              secureTextEntry
              label="Zipcode"
              value={this.state.zipcode}
              onChangeText={password => this.setState({ zipcode })}
            />
          </CardSection>

          <CardSection>
            <Button onPress={() => Actions.homescreen()} >
              Log in
            </Button>
          </CardSection>
        </Card>
      </View>
    );
  }
}

export default SignUpForm;
